#sudo apt-get libmariadbclient-dev

#pip install mysql-connector 

import datetime
import mysql.connector as mariadb
import Error
import RPi.GPIO as GPIO
from time import sleep

mySQLconnection = mysql.connector.connect(host="localhost", database="smartsenseo", user='root', password='root')

query = "SELECT * FROM users WHERE rfid = RFID" # RFID is gescant, rfid is uit de database
cursor = mySQLconnection.cursor()
cursor.execute(query)
result = cursor.fetchall()

for rows in result:
	print rows " test"

if rows.rowcount == 1:
	print("Succes! RFID " + RFID + " bestaan in database!")
	#zet hier koffie enzo
else:
	f = open("unregistred_RFIDs.txt", "W+")
	now = datetime.datetime.now()
	f.write(RFID + " @ " + now + " rowcount = " + rows.rowcount + "\n")
	f.close()