pids=$(pidof /usr/bin/Xvfb)
if [ -n "$pids" ]; then
	echo "Monitor already active at " . "$pids"
  	#echo  processes="$(ps --format command --no-headers -ww --pid $pids)"
else 
	echo "Not running. starting monitor"
	Xvfb :1 -screen 0 1280x768x24 &
fi

export DISPLAY=:1

./processing-2.0/processing-java --sketch=Processing_pixels/pixels --output=outputFolder --force --run

