#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
#include <DNSServer.h>

#define WIFI_SSID "SmartLiving"
#define WIFI_PASS "#A12345678"

// WiFi credentials
const char *ssid = "SmartPower";
const char *password = "#12345678";

DNSServer dnsServer;
IPAddress apIP(10, 0, 0, 1);

const int RELAY1_PIN = D1;
const int RELAY2_PIN = D2;
const int RELAY3_PIN = D3;
const int RELAY4_PIN = D4;
ESP8266WebServer server(80);

void handleRelay1On()
{
  digitalWrite(RELAY1_PIN, LOW);
  digitalWrite(LED_BUILTIN, LOW);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay1Off()
{
  digitalWrite(RELAY1_PIN, HIGH);
  digitalWrite(LED_BUILTIN, HIGH);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay2On()
{
  digitalWrite(RELAY2_PIN, LOW);
  digitalWrite(LED_BUILTIN, LOW);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay2Off()
{
  digitalWrite(RELAY2_PIN, HIGH);
  digitalWrite(LED_BUILTIN, HIGH);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay3On()
{
  digitalWrite(RELAY3_PIN, LOW);
  digitalWrite(LED_BUILTIN, LOW);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay3Off()
{
  digitalWrite(RELAY3_PIN, HIGH);
  digitalWrite(LED_BUILTIN, HIGH);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay4On()
{
  digitalWrite(RELAY4_PIN, LOW);
  digitalWrite(LED_BUILTIN, LOW);
  delay(100);
  server.send(200, "text/plain", "success");
}

void handleRelay4Off()
{
  digitalWrite(RELAY4_PIN, HIGH);
  digitalWrite(LED_BUILTIN, HIGH);
  delay(100);
  server.send(200, "text/plain", "success");
}

void setup()
{
  pinMode(LED_BUILTIN, OUTPUT);
  pinMode(RELAY1_PIN, OUTPUT);
  pinMode(RELAY2_PIN, OUTPUT);
  pinMode(RELAY3_PIN, OUTPUT);
  pinMode(RELAY4_PIN, OUTPUT);
  digitalWrite(LED_BUILTIN, HIGH);
  digitalWrite(RELAY1_PIN, HIGH);
  digitalWrite(RELAY2_PIN, HIGH);
  digitalWrite(RELAY3_PIN, HIGH);
  digitalWrite(RELAY4_PIN, HIGH);

  // Set up WiFi and DNS server
  WiFi.softAPConfig(apIP, apIP, IPAddress(255, 255, 255, 0));
  WiFi.softAP(ssid, password);
  dnsServer.start(53, "*", apIP);

  WiFi.setHostname("SmartLiving");
  WiFi.begin(WIFI_SSID, WIFI_PASS);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  server.on("/relay1/on", HTTP_POST, handleRelay1On);
  server.on("/relay1/off", HTTP_POST, handleRelay1Off);
  server.on("/relay2/on", HTTP_POST, handleRelay2On);
  server.on("/relay2/off", HTTP_POST, handleRelay2Off);
  server.on("/relay3/on", HTTP_POST, handleRelay3On);
  server.on("/relay3/off", HTTP_POST, handleRelay3Off);
  server.on("/relay4/on", HTTP_POST, handleRelay4On);
  server.on("/relay4/off", HTTP_POST, handleRelay4Off);
  server.begin();
}

void loop()
{
  server.handleClient();
}
