/*
 * Control Haptic Feedback
 */

// Current Vibration Patterm
var curVibe = 0;
// timer event
var tmint;
// initHaptics() must be called from the on loading of the web page
function initHaptics() {
  // Listen for touchmove and touchend.
  document.body.addEventListener("touchmove", buzzPos, false);
  document.body.addEventListener("touchend", buzzStop, false);
  // Set a timer event, in this case firing every 150 msec, to repeat
  // current vibration pattern. You should adjust this interval to
  // correspond the vibration pattern durations you use.
  tmint = window.setInterval(buzzTime, 150);
}
function buzzTime() {
  // vibrate at the end of each defined time interval
  window.navigator.vibrate(curVibe);
}
function buzzPos(event) {
  // This makes vibration work in Chrome Beta for Android (although it can cause other issues).
  event.preventDefault();
  // Find the element where the touch occurs.
  e = document.elementFromPoint(
    event.touches.item(0).clientX,
    event.touches.item(0).clientY
  );
  curVibe = 0;
  // Use the following if statements to assign vibration events based on element ID.
  // You can alternatively look for element names or class names.
  if (e.id == "f1") {
    curVibe = 100;
    window.navigator.vibrate(curVibe);
  }
  if (e.id == "li") {
    curVibe = 50;
    window.navigator.vibrate(curVibe);
  }
}
function buzzStop() {
  // This makes vibration work in Chrome Beta for Android (although it can cause other issues).
  event.preventDefault();
  // Stop vibration.
  window.navigator.vibrate(0);
  curVibe = 0;
}
 