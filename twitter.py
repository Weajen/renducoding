from machine import Pin, PWM
import network   #import des fonction lier au wifi
import random
import urequests	#import des fonction lier au requetes http
import utime	#import des fonction lier au temps
import json
import ujson	#import des fonction lier aà la convertion en Json

wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi

pwm_led = PWM(Pin(17,mode=Pin.OUT)) #red
pwm_led.freq(1_000)

pwm_led2 = PWM(Pin(19,mode=Pin.OUT))  #blue
pwm_led2.freq(1_000)

pwm_led3 = PWM(Pin(18,mode=Pin.OUT))  #green
pwm_led3.freq(1_000)

ssid = "TuVeuxD'laCoHein ?"
password = 'jaipaslaceinture'
wlan.connect(ssid, password) # connecte la raspi au réseau

def showTag (tweetTag): #assigne les différents types des pokémon aux couleurs des led
    if tweetTag == "bleu":
        pwm_led.duty_u16(0)
        pwm_led2.duty_u16(10000)
        pwm_led3.duty_u16(0)
    if tweetTag == "vert":
        pwm_led.duty_u16(0)
        pwm_led2.duty_u16(0)
        pwm_led3.duty_u16(10000)
    if tweetTag == "red":
        pwm_led.duty_u16(10000)
        pwm_led2.duty_u16(0)
        pwm_led3.duty_u16(0)
    if tweetTag == "jaune":
        pwm_led.duty_u16(10000)
        pwm_led2.duty_u16(0)
        pwm_led3.duty_u16(10000)
        
while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)
    pass

while(True):
    try:
        url = "http://10.2.163.95/cours/getOne.php"
        r = urequests.get(url)
        tweetTag = r.json()['tag']
        showTag(tweetTag)
        print(tweetTag)
        r.close() # ferme la demande
        utime.sleep(5)  
    except Exception as e:
        print(e)