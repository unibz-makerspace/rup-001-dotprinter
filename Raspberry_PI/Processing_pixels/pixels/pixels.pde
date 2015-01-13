import processing.serial.*;

import java.net.*;
import java.io.*;
import java.util.logging.Level;
import java.util.logging.Logger;

Serial myPort;  // Create object from Serial class
PImage IMG; //create a PImage named IMG

int delayAmount = 0;

void setup() {
 
    String portName = Serial.list()[0]; //0
    
  
     myPort = new Serial(this, portName, 9600);//opens the Serial Port
    //IMG = loadImage("C:\\Users\\Daniele\\Dropbox\\pc_sharing\\UniBZ\\Management Engineering\\Arduino\\Processing_pixels\\pixels\\pics\\drone_print.png");//Open your image.
    IMG = loadImage("D:\\FTP\\plus_test.png");
    //IMG = loadImage("/var/www/print.png");
    image(IMG, 0, 0);
    
    //print 40 blank dots because... it's fucked up. Simple as that.
    for(int i=0; i < 41; i++)
    {
      System.out.print(" 0 ");
      myPort.write('0'); 
    }
    System.out.println();
    
    delay(100);
    
    myPort.write('L');
   

}
void draw()   {
  
  
  IMG.loadPixels(); 
  
  
  for (int y = 0; y < IMG.height; y++) {//check the lines
    for (int x = 0; x < IMG.width; x++) { //check each pixel in the line
      int loc = x + y * IMG.width; //the pixels are loaded as in a array, so its position is only a number.
             
    if (IMG.pixels[loc]>color(160)) { //128
        myPort.write('0');//if a pixel is not black, send a '0'.
        System.out.print(" 0 "); //get matrix with 0 1 of image
        delay(50);
        
        delayAmount += 30;
      }
      else {
        myPort.write('1');//if a pixel is black, send a '1'.  
        System.out.print(" 1 "); //get matrix with 0 1 of image
        delay(50); //50
        
        delayAmount += 600;
      }
    }
    
    

    delay(delayAmount); //1000 wait 1 second for each pixel printed

    delayAmount = 0;
    
    myPort.write('L');//send a "L" to indicate a new line.
  
   // while (myPort.available() <= 0) {
        // until we receive the finish acknowledgement, wait
     //  delay(100);
  //  }
  //  int data; ////debug shit for end of line control
   // data = myPort.read();
  
    System.out.println();
  }
  noLoop();
  
  //all these try-catches are here to avoid including throws
  //clauses for URL requests since the latter are not supported by Processing
             
   String urlString = "http://banglaitalia.unibz.it/status%20change/?status=0";
    
  URL urlRequest = null;
  try {
    urlRequest = new URL(urlString);
  } catch (MalformedURLException ex) {
    Logger.getLogger(pixels.class.getName()).log(Level.SEVERE, null, ex);
  }
  URLConnection yc = null;
  try {
    yc = urlRequest.openConnection();
  } catch (IOException ex) {
    Logger.getLogger(pixels.class.getName()).log(Level.SEVERE, null, ex);
  }
  BufferedReader in = null;
  try {
    in = new BufferedReader(new InputStreamReader(
        yc.getInputStream()));
  } catch (IOException ex) {
    Logger.getLogger(pixels.class.getName()).log(Level.SEVERE, null, ex);
  }
  String inputLine;
  //display server response, again debug shit
  //try {
     // while ((inputLine = in.readLine()) != null)
    //    System.out.println(inputLine);
   // } catch (IOException ex) {
  //    Logger.getLogger(pixels.class.getName()).log(Level.SEVERE, null, ex);
  //}
  try {
    in.close();
  } catch (IOException ex) {
    Logger.getLogger(pixels.class.getName()).log(Level.SEVERE, null, ex);
  }
    
    
  
}


