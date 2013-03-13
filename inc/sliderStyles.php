<link class="rs-file" href="assets/royalslider/royalslider.css" rel="stylesheet">
<link class="rs-file" href="assets/royalslider/skins/default/rs-default.css" rel="stylesheet">
<style>
.visibleNearby {
  width: 100%;
  background: #e3e3e3;
  color: #FFF;
  border-top: 1px solid #000;
  margin-top: 60px;
}
.visibleNearby .rsGCaption {
  font-size: 16px;
  line-height: 18px;
  border-bottom:1px solid #000;
 /*  padding: 12px 0 16px; */
  background: #e3e3e3;
  width: 100%;
  position: static;
  float: left;
  left: auto;
  bottom: auto;
  text-align: center;
  margin-bottom: 60px;
}
.visibleNearby .rsGCaption span {
  display: block;
  clear: both;
  color: #bbb;
  font-size: 14px;
  line-height: 22px;
}


/* Scaling transforms */
.visibleNearby .rsSlide img {
  opacity: 0.45;
  -webkit-transition: all 0.3s ease-out;
  -moz-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;

  -webkit-transform: scale(0.9);  
  -moz-transform: scale(0.9); 
  -ms-transform: scale(0.9);
  -o-transform: scale(0.9);
  transform: scale(0.9);
}
.visibleNearby .rsActiveSlide img {
  opacity: 1;
  -webkit-transform: scale(1);  
  -moz-transform: scale(1); 
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}

/* Non-linear resizing on smaller screens */
@media screen and (min-width: 0px) and (max-width: 900px) { 
  #gallery-1 {
    padding: 12px 0 12px;
  }
  #gallery-1 .rsOverflow,
  .royalSlider#gallery-1 {
    height: 400px !important;
  }
}
@media screen and (min-width: 0px) and (max-width: 500px) { 
  #gallery-1 .rsOverflow,
  .royalSlider#gallery-1 {
    height: 300px !important;
  }
}
</style>