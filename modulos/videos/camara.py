import cv2
import argparse
import imutils
import serial
import time #from threading 
import datetime
import mysql.connector


def guardar_lectura(lectura):
    cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='paladin1')
    cursor = cnx.cursor()
    add_senial = ("INSERT INTO senial (id_senial, id_sensor, fecha_hora) VALUES (NULL, "+ str(resultado) +", now())")
    cursor.execute(add_senial)
    cnx.commit()
    cursor.close()
    cnx.close()
def guardar_videos():
    cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='paladin1')
    cursor = cnx.cursor()
    #add_video = ("INSERT INTO video (id_video, duracion, fecha_hora) VALUES (NULL, "+ str(hora_apagado) +", now())")
    add_video = ("INSERT INTO video (id_video, duracion, fecha_hora) VALUES (NULL, '00:00:05', now())")
    cursor.execute(add_video)
    cnx.commit()
    cursor.close()
    cnx.close()
arduino = serial.Serial('COM5', baudrate=9600, timeout=1.0)
argument_parser = argparse.ArgumentParser()
argument_parser.add_argument('-c', '--camera', type=int, default=0)
argument_parser.add_argument('-s', '--size', type=int, default=600)
arguments = vars(argument_parser.parse_args())
camara = cv2.VideoCapture(arguments['camera'])
salida = cv2.VideoWriter(str(datetime.datetime.now()),cv2.VideoWriter_fourcc(*'XVID'),20.0,(640,480))
while True:
    line = arduino.readline()
    resultado = line.decode("utf-8")
    print (resultado)
    if resultado != '':
        resultado = int(resultado)
        if resultado > 0:
            print(resultado)
            guardar_lectura(resultado)
            hora_apagado = datetime.datetime.now() + datetime.timedelta(seconds=5)
            while (camara.isOpened()):
                ret, imagen = camara.read()
                #time.sleep(5.1)
                if datetime.datetime.now() >= hora_apagado:
                    print("apagar camara")
                    camara.release()
                    salida.release()
                    cv2.destroyAllWindows()
                    guardar_videos()
                    camara = cv2.VideoCapture(arguments['camera'])
                    salida = cv2.VideoWriter('Video3',cv2.VideoWriter_fourcc(*'XVID'),20.0,(640,480))
                    break
                if ret == True:
                    cv2.imshow('video', imagen)
                    salida.write(imagen)
                    if cv2.waitKey(1) & 0xFF == ord('s'):
                        break
                else: break        
    
