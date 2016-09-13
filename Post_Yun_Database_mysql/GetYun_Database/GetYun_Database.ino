/*
 Nicolas Escobar Cruz
 */

#include <Bridge.h>
#include <HttpClient.h>
//long litros;
int sensorValue = A0;
int litros=0;
long id;
//int litros;
String precio;
String corazon = "litros_corazon.php";
String cerebro= "litros_cerebro.php";


void setup() {
 
  //litros = random (100, 1000);
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
litros = random (100, 1000);
//litros=analogRead(sensorValue);
delay(3000);
//litros = Serial.println  (litross);

id = random (10,13);

if(litros  > 99 && litros <= 300){precio =" Consumo Estable";}
if(litros >=  300 && litros <= 600){precio ="Consumo Leve";}
if(litros >=  600 && litros <= 800){precio ="Consumo Grave";}
if(litros >=  800 && litros <= 1000){precio ="Consumo Critico";}
//
//http://192.168.1.102/Chart.js_MySQL/testmysql.php  //
client.get("http://192.168.1.102:80/Chart.js_MySQL/litros_cerebro.php?litros="+String(litros)+ "&precio="+ String(precio));


delay(60000);
  
  // if there are incoming bytes available
  // from the server, read them and print them:
  while (client.available()) {
    char c = client.read();
    Serial.print(c);
  }
  Serial.flush();

  delay(5000);
}




