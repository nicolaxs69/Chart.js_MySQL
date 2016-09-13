/*
  Yún HTTP Client

 This example for the Arduino Yún shows how create a basic
 HTTP client that connects to the internet and downloads
 content. In this case, you'll connect to the Arduino
 website and download a version of the logo as ASCII text.

 created by Tom igoe
 May 2013

 This example code is in the public domain.

 http://www.arduino.cc/en/Tutorial/HttpClient

 */

#include <Bridge.h>
#include <HttpClient.h>
//long dato;
int sensorValue = A0;
int dato=0;
long id;
//int dato;
String estado;
String corazon = "dato_corazon.php";
String cerebro= "dato_cerebro.php";


void setup() {
 
  //dato = random (100, 1000);
  pinMode(13, OUTPUT);
  digitalWrite(13, LOW);
  Bridge.begin();
  digitalWrite(13, HIGH);

  Serial.begin(9600);
  while (!Serial); // wait for a serial connection
}

void loop() {

// Initialize the client library
HttpClient client;
//dato = random (100, 1000);
dato=analogRead(sensorValue);
delay(3000);
//dato = Serial.println  (datos);

id = random (10,13);

if(dato  > 99 && dato <= 300){estado ="Estable";}
if(dato >=  300 && dato <= 600){estado ="Leve";}
if(dato >=  600 && dato <= 800){estado ="Grave";}
if(dato >=  800 && dato <= 1000){estado ="Critico";}

client.get("http://192.168.0.2:8080/dato_cerebro.php?identificacionPaciente="+ String(id)+"&dato="+String(dato)+ "&estado="+ String(estado));
//client.get("http://192.168.0.2:8080/""?identificacionPaciente="+ String(id)+"&dato="+String(dato)+ "&estado="+ String(estado));
  
  // if there are incoming bytes available
  // from the server, read them and print them:
  while (client.available()) {
    char c = client.read();
    Serial.print(c);
  }
  Serial.flush();

  delay(5000);
}




