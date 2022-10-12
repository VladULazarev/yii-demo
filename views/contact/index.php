<?php
$this->title = 'Contact Us';
$this->params['meta_description'] = 'Description of the Contact Us page';
?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text mb-5">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>contact us</h4>
            <h2>let’s stay in touch!</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Banner Ends Here -->

<section class="contact-us">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="down-contact">
          <div class="row">
            <div class="col-lg-8">
              <div class="sidebar-item contact-form">
                <div class="sidebar-heading">
                  <h2>Send us a message</h2>
                </div>
                <div class="content">
                  <form id="contact">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="name"
                            type="text"
                            id="name"
                            placeholder="Your name"
                            required  autocomplete="off">
                        </fieldset>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="email"
                          type="email"
                          id="email"
                          placeholder="Your email"
                          required autocomplete="off">
                        </fieldset>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <fieldset>
                          <input name="subject"
                          type="text"
                          id="subject"
                          placeholder="Subject"
                          required autocomplete="off">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message"
                          rows="6" id="message"
                          placeholder="Your Message"></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="send-message" class="main-button">Send Message</button>
                        </fieldset>
                      </div>
                    </div>
                    <div class="contact-form-pop-up">
                      <div class="modal no-bg">
                        <div class="modal-dialog modal-confirm load-img-container">
                            <img class="load-img" src="/web/includes/preloader.gif">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="form-errors mt-4 ">
                <h5 class="wrong form-error py-2">Something went wrong!</h5>
                <h6 class="ok form-error">OK! We contact you shortly.</h6>
                <p class="bad-name form-error">The name has wrong symbol or empty!</p>
                <p class="bad-email form-error">The email has wrong symbol or empty!</p>
                <p class="bad-subject form-error">The subject has wrong symbol or empty!</p>
                <p class="bad-message form-error">The message has wrong symbol or empty!</p>
                <p class="many-messages form-error">You've sent to many messages!</p>
              </div>

            </div>
            <div class="col-lg-4">
              <div class="sidebar-item contact-information">
                <div class="sidebar-heading">
                  <h2>contact information</h2>
                </div>
                <div class="content">
                  <ul>
                    <li>
                      <h5><a href="tel:090-484-8080" class="contact-link">090-484-8080</h5>
                      <span>PHONE NUMBER</span>
                    </li>
                    <li>
                      <h5><a href="mailto:info@company.com" class="contact-link">info@company.com</a></h5>
                      <span>EMAIL ADDRESS</span>
                    </li>
                    <li>
                      <h5>123 Aenean id posuere dui,
                        <br>Praesent laoreet 10660</h5>
                      <span>STREET ADDRESS</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div id="map">
          <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>

    </div>
  </div>
</section>