#include <ESP8266WiFi.h>

//Beat Rate vaiables*********************
int sensor = 16;
int counter = 0;
int heart_beat = 0;
float temp = 0;
//*************************************

//System & Oxygen pin
int sys = 4;
int oxy = 5;
//*******************

//Wifi Connection**********************
const char* ssid     = "Aristocat";
const char* password = "hashtag17";
const char* host = "192.168.0.103";
//*************************************

void send_data_to_wifi( int heart_beat, float temp, int system_status, int oxygen){
  Serial.print("connecting to ");
  Serial.println(host);
  
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  
        // We now create a URI for the request

       String ps = "?p=";
       String ts = "&t=";
       String ss = "&s=";
       String os = "&o="; 
       
        
       String url = "/rp/u.php";
        url += ps+heart_beat;
        url += ts+temp;
        url += ss+system_status;
        url += os+oxygen;
        
        Serial.print("Requesting URL: ");
        Serial.println(url);
        
        // This will send the request to the server
        client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                     "Host: " + host + "\r\n" + 
                     "Connection: close\r\n\r\n");
        unsigned long timeout = millis();
        while (client.available() == 0) {
          if (millis() - timeout > 5000) {
            Serial.println(">>> Client Timeout !");
            client.stop();
            return;
          }
        }
        
        // Read all the lines of the reply from server and print them to Serial
        while(client.available()){
          String line = client.readStringUntil('\n');
          Serial.println(line);
          if(line.substring(0,7) == "Success")
          {
            Serial.write("Y");
          }else if(line.substring(0,6) == "Failed")
          {
            Serial.write("N");
          }else if(line.substring(0,4)=="User")
          {
            Serial.write("O");
          }
        }
        Serial.println();
        Serial.println("closing connection");
    //}
 
  
  }

void setup() {
  
  //Sensor pin mode input***********
  pinMode(sensor, INPUT);
  pinMode(10, INPUT);
  pinMode(sys, OUTPUT);
  pinMode(oxy, OUTPUT);
  //********************************

  
  Serial.begin(9600);
  delay(10);
  pinMode(2, OUTPUT);
  digitalWrite(2, LOW);
  // We start by connecting to a WiFi network
  
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  digitalWrite(2, HIGH); 
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  

}

void loop() {

  //Starting Switch************************
    if(digitalRead(10)==HIGH){

  //***************************************
    temp = random(97,100);

    
  if(digitalRead(sensor)==LOW){

    digitalWrite(sys, LOW);
    digitalWrite(oxy, LOW);
    
    heart_beat = random(70,75);
    send_data_to_wifi(heart_beat,temp,0,0);
    Serial.print("heart_beat: ");
    Serial.println(heart_beat);
    Serial.print("Temperature: ");
    Serial.println(temp);
    
    counter = 0;
    delay(2000);
    
  }else{
    counter++;
    
    if (counter == 5){
      digitalWrite(sys, HIGH);
      digitalWrite(oxy, LOW);
      send_data_to_wifi(0,temp,1,0);
      Serial.println("System ON");
      delay(30000);

      digitalWrite(sys, LOW);
      digitalWrite(oxy, HIGH);
      send_data_to_wifi(0,temp,0,1);
      Serial.println("Oxygen ON");
      delay(5000);
      
      counter =0;
  }
  
  delay(1500);
  }
 
 //Starting Switch************************
    }
    else{
       send_data_to_wifi(0,0,0,0);
      }

  //***************************************
  
}
