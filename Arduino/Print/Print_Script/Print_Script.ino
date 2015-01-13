
#define time 4// time in miliseconds between each motor's step
#define pentime 200 //time of the pulse in the pen motor
#define pulltime 360//380 time(in microseconds to allow a alrge range) of the pulse on the motor to pull the paper.

#define penPin 4   //pen motor pin
#define paperPin 5 //paper motor pin

#define StepperA1 9  //stepper motor pins
#define StepperA2 10 //
#define StepperB1 11 //
#define StepperB2 12 //

#define NEW_LINE 48 //47

int newLine = 0;

byte data;//byte to receive and check data from computer
void setup() {            
  Serial.begin(9600);//Start the Serial port.  

  pinMode(StepperA1, OUTPUT);//Stepper motor pins as output
  pinMode(StepperA2, OUTPUT);
  pinMode(StepperB1, OUTPUT);
  pinMode(StepperB2, OUTPUT);

  pinMode(penPin,OUTPUT);//Pen motor pin as a output
  pinMode(paperPin,OUTPUT);//Paper motor pin as a output
  forward(NEW_LINE);
  back(NEW_LINE);//makes the car return, to be sure it will start at the begin of the line
  
  //pull the gear at the beginning because of a "dead roll"
  digitalWrite(paperPin,HIGH);
  delay(3000);
  digitalWrite(paperPin,LOW);
  
}

void loop() {
  if(Serial.available()){//if there is data on the Serial buffer
    while(Serial.available()>0){//continues reading the values on the buffer.
      data=Serial.read();
      if(data=='1'){
        dot();//if a one was received, makes a dot.
        forward(1);//avances one time (four steps)
        newLine++;
        
      }

      if(data=='0'){
        forward(1);// if a zero was received just avances.
        newLine++;
      }
      if(data=='L'){//if a "L" was received, pull the paper to begin a new line.
        pullPaper();//call the pulling paper function.
        back(newLine);//return the car.
        Serial.println(newLine);
        newLine = 0;
        
        
      }
    }
  }
}
void forward(int number){//forward function, you can choose the number of steps when calling the function
  int i=0;//to control the number of steps
  while(i<number){
    digitalWrite(StepperA1, HIGH); //this sequence is part of the basic algoritm to control a bipolar stepper motor.  
    digitalWrite(StepperA2, LOW);    
    digitalWrite(StepperB1, HIGH);     
    digitalWrite(StepperB2, LOW);     
    delay(time);//wait the time defined.                
    digitalWrite(StepperA1, HIGH);    
    digitalWrite(StepperA2, LOW);     
    digitalWrite(StepperB1, LOW);    
    digitalWrite(StepperB2, HIGH);     
    delay(time);
    digitalWrite(StepperA1, LOW);    
    digitalWrite(StepperA2, HIGH);     
    digitalWrite(StepperB1, LOW);    
    digitalWrite(StepperB2, HIGH);     
    delay(time);
    digitalWrite(StepperA1, LOW);    
    digitalWrite(StepperA2, HIGH);     
    digitalWrite(StepperB1, HIGH);    
    digitalWrite(StepperB2, LOW);     
    delay(time);
    i++;
  }
  digitalWrite(StepperA1, LOW);    
  digitalWrite(StepperA2, LOW);     
  digitalWrite(StepperB1, LOW);    
  digitalWrite(StepperB2, LOW);     

}

void back(int number){//As the forward function, but makes the reverse sequence.
  int i=0;
  while(i<number){
    digitalWrite(StepperA1, LOW);    
    digitalWrite(StepperA2, HIGH);     
    digitalWrite(StepperB1, HIGH);    
    digitalWrite(StepperB2, LOW);     
    delay(time);

    digitalWrite(StepperA1, LOW);    
    digitalWrite(StepperA2, HIGH);     
    digitalWrite(StepperB1, LOW);    
    digitalWrite(StepperB2, HIGH);     
    delay(time);

    digitalWrite(StepperA1, HIGH);    
    digitalWrite(StepperA2, LOW);     
    digitalWrite(StepperB1, LOW);    
    digitalWrite(StepperB2, HIGH);     
    delay(time);

    digitalWrite(StepperA1, HIGH);    
    digitalWrite(StepperA2, LOW);     
    digitalWrite(StepperB1, HIGH);    
    digitalWrite(StepperB2, LOW);     
    delay(time);                 

    i++;
  }
  digitalWrite(StepperA1, LOW);    
  digitalWrite(StepperA2, LOW);     
  digitalWrite(StepperB1, LOW);    
  digitalWrite(StepperB2, LOW);     

}
void dot(void){//actives the pen motor for some time
  digitalWrite(penPin,HIGH);
  delay(pentime);
  digitalWrite(penPin,LOW);
  delay(500); //to allocate more time for the pen to go back up
}

void pen(void){                        //this functions can be used if you want to make lines instead of dots,
  digitalWrite(penPin,HIGH);           // I think that the dots are cool.
}                                      //
void nopen(void){                      //
  digitalWrite(penPin,LOW);            //
}                                      //

void pullPaper(void){ //function to pull the paper
  digitalWrite(paperPin,HIGH);
  delay(pulltime);
  digitalWrite(paperPin,LOW);
}

