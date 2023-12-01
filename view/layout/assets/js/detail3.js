// Product Detail
const idDetail = document.getElementById("iddetail");
const policy = document.getElementById("policy");
const comment = document.getElementById("comment");
const detailContent = document.querySelector(".detail-policy");
const detailContent2 = document.querySelector(".detail-content-2");
const detailComment = document.querySelector(".detail-content-comment");
const detailTab = document.querySelectorAll(".detail-tab__link");
const sizeItems = document.querySelectorAll(".detail-size__item");

var detail_image=document.getElementsByClassName('detail-image');
var detail_color=document.getElementsByClassName('detail-circle');
var imgcart=document.getElementsByClassName('addtocart')[0].children[1];
var colorcart=document.getElementsByClassName('addtocart')[0].children[3];
var sizecart=document.getElementsByClassName('addtocart')[0].children[4];
var soluongcart=document.getElementsByClassName('addtocart')[0].children[5];
detail_color[0].style.border="0.5px solid gray";
colorcart.value=detail_color[0].children[0].innerHTML;
imgcart.value=detail_image[0].children[1].innerHTML;
function change_color(a){
    var ind=0;
    for(let i=0;i<detail_color.length;i++){
      detail_color[i].style.border='none';
      detail_image[i].style.display='none';
      if(a==detail_color[i]){
        ind=i;
      }
    }
    a.style.border="0.5px solid gray";
    colorcart.value=a.children[0].innerHTML;
    detail_image[ind].style.display='flex';
    imgcart.value=detail_image[ind].children[1].innerHTML;
}
var sub_img=document.getElementsByClassName('detail-image__item');
var main_img=document.getElementsByClassName('detail-img');
function change_img(a){
    var ind=0;
    for(let i=0;i<detail_image.length;i++){
      if(detail_image[i].style.display!="none"){
        ind=i;
      }
    }
    main_img[ind].src=a.src;
}

var soluong=document.getElementsByClassName('detail-input')[0].children[1];
soluongcart.value=soluong.value;
function update_soluong() {
  soluongcart.value=soluong.value;
}
function minus(){
  if(soluong.value>1){
    soluong.value--;
  }
  soluongcart.value=soluong.value;
}
function plus(){
  soluong.value++;
  soluongcart.value=soluong.value;
}


var pick_size=document.getElementsByClassName('pick-size')[0];
sizecart.value=pick_size.innerHTML;
[...sizeItems].forEach((item) => item.addEventListener("click", handleSizeClick));
function handleSizeClick(event) {
  console.log(event.target);
  [...sizeItems].forEach((item) => item.classList.remove("active"));
  event.target.classList.add("active");
  pick_size.innerHTML=event.target.innerHTML;
  sizecart.value=pick_size.innerHTML;
}

[...detailTab].forEach((item) => item.addEventListener("click", handleTabClick));
function handleTabClick(event) {
  // console.log(event.target);
  [...detailTab].forEach((item) => item.classList.remove("active"));
  event.target.classList.add("active");
}
policy.addEventListener("click", showPolicy);
function showPolicy() {
  detailContent.style.display = "none";
  detailComment.style.display = "none";
  detailContent2.style.display = "block";
}

comment.addEventListener("click", showComment);
function showComment() {
  detailContent.style.display = "none";
  detailContent2.style.display = "none";
  detailComment.style.display = "block";
}

idDetail.addEventListener("click", showIdDetail);
function showIdDetail() {
  detailComment.style.display = "none";
  detailContent2.style.display = "none";
  detailContent.style.display = "block";
}
                    
// Lấy tất cả các đối tượng radio input
const ratingInputs = document.querySelectorAll('input[name="rating"]');

// Đặt sự kiện click cho từng đối tượng input
ratingInputs.forEach(input => {
    input.addEventListener("click", function () {
        const selectedRating = document.getElementById("selectedRating");
        selectedRating.value = this.value;
    });
});

