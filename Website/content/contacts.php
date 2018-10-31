<h2 class="content-heading">Contact</h2>
<div class="status_message"> </div>
<form action="#" method="post" id="contact_form">
  <h3 class="fn org small-heading">Charles Curt</h3>
  <div class="adr"> <span class="street-address"> 2784 Homestead Rd</span>,<br/>
    <span class="locality">Santa Clara</span>, <span class="postal-code">CA 95051</span>,<br/>
    <span class="country-name">United States</span> </div>
  <div class="adr-contacts"> <span class="tel"> <span class="type">Phone</span> 321-831-6888 </span><br/>
    <span>Email: <span class="email">curt.charles.ee@gmail.com</span> </span><br/>
    <span>Website: <a class="url" href="http://www.THISWEBSITE.com">www.THISWEBSITE.com</a> </span> </div>
  <p>
    <label>Your Name:<br />
      <input type="text" size="40" name="name" id="contact_name" />
    </label>
  </p>
  <p>
    <label>E-mail*:<br />
      <input type="email" size="40" name="email" id="contact_email" onkeyup="validateEmail()"/>
    </label>
  </p>
  <p>
    <label>Subject:<br />
      <input type="text" size="40" id="contact_subject" name="subject" />
    </label>
  </p>
  <p>
    <label>Message*:<br />
      <textarea cols="40" rows="10" name="message" id="contact_message" onkeyup="validateMessage()"></textarea>
    </label>
  </p>
  <p>Fields marked with an asterisk(*) are required!</p>
  <input class="button" type="submit" name="submit" value="Send Message" />
</form>
<div id="map_canvas"> <span class="map_load">Loading map... </span></div>
<div class="clear"></div>
