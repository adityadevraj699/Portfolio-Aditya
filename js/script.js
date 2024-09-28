var typed = new Typed('#multiple-text', {
    strings: ['Frontend Developer','coder','Blogger','Freelancer'],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 1000,
    loop: true,
    showCursor: true,       
    cursorChar: '_', 
  });

  function sendMail() {
    var params = {
      name: document.getElementById("name").value,
      email: document.getElementById("email").value,
      phone: document.getElementById("phone").value,
      subject: document.getElementById("subject").value,
      message: document.getElementById("message").value,
    };
  
    const serviceID = "service_m8q92iw";
    const templateID = "template_lp1lcuk";
  
      emailjs.send(serviceID, templateID, params)
      .then(res=>{
          document.getElementById("name").value = "";
          document.getElementById("email").value = "";
          document.getElementById("phone").value = "";
          document.getElementById("subject").value = "";
          document.getElementById("message").value = "";
          console.log(res);
          alert("Your message sent successfully!!\nThankyou for connecting ADITYA KUMAR .")
  
      })
      .catch(err=>console.log(err));
  
  }