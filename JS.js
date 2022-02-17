
 // code scroll 
 let div = document.querySelector(".up");

 window.onscroll = function () {
   // console.log(this.scrollY);
   if (this.scrollY >= 200) {
     div.classList.add("show");
   } else  {
     div.classList.remove("show");
   }
 };
//------Start code text view -----//
 const TypeWriter = function (txtElement, words, wait = 10) {
    this.txtElement = txtElement;
    this.words = words;
    this.txt = "";
    this.wordIndex = 0;
    this.wait = parseInt(wait, 10);
    this.type();
    this.isDeleting = false;
  };
  TypeWriter.prototype.type = function () {
    const current = this.wordIndex % this.words.length;

    const fullTxt = this.words[current];

    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

    let typeSpeed = 250;

    if (this.isDeleting) {
      typeSpeed /= 0;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
      typeSpeed = this.wait;

      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === "") {
      this.isDeleting = false;
      this.wordIndex++;
      typeSpeed = 500;
    }
   
    setTimeout(() => this.type(), typeSpeed);
  };
  document.addEventListener("DOMContentLoaded", init);
  function init() {
    const txtElement = document.querySelector(".txt-type");
    const words = JSON.parse(txtElement.getAttribute("data-words"));
    const wait = txtElement.getAttribute("data-wait");
    new TypeWriter(txtElement, words, wait);
  }
  // end code text 

 