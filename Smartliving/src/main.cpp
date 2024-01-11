#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>

#define WIFI_SSID "SmartLiving"
#define WIFI_PASS "#12345678"

const int RELAY1_PIN = D1;
const int RELAY2_PIN = D2;
const int RELAY3_PIN = D3;
const int RELAY4_PIN = D4;
ESP8266WebServer server(80);
MDNSResponder MDNS;


void handleRelay1On()
{
  digitalWrite(RELAY1_PIN, LOW);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay1Off()
{
  digitalWrite(RELAY1_PIN, HIGH);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay2On()
{
  digitalWrite(RELAY2_PIN, LOW);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay2Off()
{
  digitalWrite(RELAY2_PIN, HIGH);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay3On()
{
  digitalWrite(RELAY3_PIN, LOW);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay3Off()
{
  digitalWrite(RELAY3_PIN, HIGH);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay4On()
{
  digitalWrite(RELAY4_PIN, LOW);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay4Off()
{
  digitalWrite(RELAY4_PIN, HIGH);
  delay(100);
  server.send(200, "text/plain", "success");
}

void setup()
{
  pinMode(LED_BUILTIN, OUTPUT);
  pinMode(RELAY1_PIN, OUTPUT);
  pinMode(RELAY2_PIN, OUTPUT);
  digitalWrite(LED_BUILTIN, HIGH);
  digitalWrite(RELAY1_PIN, HIGH);
  digitalWrite(RELAY2_PIN, HIGH);
  WiFi.softAP("SmartLiving", "12345678");
  WiFi.setHostname("SmartLiving");
  WiFi.begin(WIFI_SSID, WIFI_PASS);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  if (MDNS.begin("SmartLiving", WiFi.localIP()))
  {
    server.on("/relay1/on", HTTP_GET, handleRelay1On);
    server.on("/relay1/off", HTTP_GET, handleRelay1Off);
    server.on("/relay2/on", HTTP_GET, handleRelay2On);
    server.on("/relay2/off", HTTP_GET, handleRelay2Off);
    server.on("/relay3/on", HTTP_GET, handleRelay3On);
    server.on("/relay3/off", HTTP_GET, handleRelay3Off);
    server.on("/relay4/on", HTTP_GET, handleRelay4On);
    server.on("/relay4/off", HTTP_GET, handleRelay4Off);
    server.begin();
    MDNS.addService("http", "tcp", 80);
  }
}

void loop()
{
  server.handleClient();
}
