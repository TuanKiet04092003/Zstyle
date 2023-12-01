$(".drag").draggable();
$(".drag").droppable();
var takeScreenShot = function() {
  html2canvas(document.getElementById("container"), {
      onrendered: function (canvas) {
          var tempcanvas = document.createElement('canvas');
          tempcanvas.width = 350;
          tempcanvas.height = 350;

          var context = tempcanvas.getContext('2d');
          context.drawImage(canvas, 112, 0, 288, 200, 0, 0, 350, 350);

          // Thay đổi đường dẫn dưới đây để lưu ảnh ở vị trí mong muốn
          // var savePath = 'C:\ParentXampp\htdocs\DuAn1\Zstyle\upload\shot.jpg';
          var savePath = 'C:/ParentXampp/htdocs/DuAn1/Zstyle/upload/shot.jpg';

          var link = document.createElement("a");
          link.href = tempcanvas.toDataURL('image/jpeg');
          
          // Gán đường dẫn lưu trữ vào thuộc tính "download"
          link.download = savePath;

          
              

          // Trigger a click on the link to initiate the download
          link.click();
      }
  });
};
