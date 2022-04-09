import webbrowser
import cv2
import pickle
from time import sleep
from selenium import webdriver
from selenium.webdriver.chrome.options import Options

sleepTime = 300
face_cascade = cv2.CascadeClassifier('Cascades/data/haarcascade_frontalface_alt2.xml')
recognizer = cv2.face.LBPHFaceRecognizer_create()
recognizer.read("trainer.yml")
labels = {}

with open("labels.pickle", 'rb') as f:
    og_labels = pickle.load(f)
    labels = {v:k for k,v in og_labels.items()}

def startFaceRecognition():
    uID = {}
    cap = cv2.VideoCapture(0)

    print("Running Face Recognizer...")
    go = True
    while go:
        # capture frame by frame
        ret, frame = cap.read()
        gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
        faces = face_cascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=5)
        for (x, y, w, h) in faces:
            roi_gray = gray[y:y + h, x: x + w]
            id_, conf = recognizer.predict(roi_gray)
            if conf <=70:
                font = cv2.FONT_HERSHEY_SIMPLEX
                name = labels[id_]
                color = (255, 255, 255)
                stroke = 2
                cv2.putText(frame, name, (x, y), font, 1, color, stroke, cv2.LINE_AA)
                if id_ in uID:
                    uID[id_] += 1
                else:
                    uID[id_] = 1
                if uID[id_] > 20:
                    print("Face Recognized! Opening browser...")
                    print(uID)
                    driverObject=openBrowser(id_)
                    uID = {}
                    go=False
                    break
            color = (0, 255, 0)
            stroke = 2
            end_x = x + w
            end_y = y + h
            cv2.rectangle(frame, (x, y), (end_x, end_y), color, stroke)
        # show captured frames in a window
        cv2.imshow('frame', frame)
        # print(frame)s
        img_item = "imageStream/my_image.png"
        cv2.imwrite(img_item, frame)
        if not go:
            sleep(sleepTime)
            driverObject.quit()
            break
        if cv2.waitKey(20) & 0xFF == ord('q'):
            break
    print("Stopping Recognizer...")

    cap.release()
    cv2.destroyAllWindows()

    print("Recognizer Stopped!")
    startFaceRecognition()


def openBrowser(userId):
    url = "http://localhost/smartmirror/mirror/" + str(userId+1)
    chromeOptions = Options()
    chromeOptions.add_argument("--kiosk")
    chromeOptions.add_argument("disable-infobars")
    driver = webdriver.Chrome(chrome_options=chromeOptions)  # Would like chrome to start in fullscreen
    driver.get(url)
    return driver;
    print("Website Opened...")

startFaceRecognition()

