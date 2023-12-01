var draggingElements;
function drag(event,id) {
    event.dataTransfer.setData("text", event.target.id);
    draggingElements=id;
  }

  
  function allowDrop(event) {
    event.preventDefault();
  }
  
 
  function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text");
    var draggedElement = document.getElementById(data).parentElement;
  
    // Calculate the position relative to the drop area
    if(draggingElements=='zoom'){
      var offsetX = event.clientX - event.target.getBoundingClientRect().left;
      var offsetY = event.clientY - event.target.getBoundingClientRect().top;

      var xdau=event.target.getBoundingClientRect().left;
      var ydau=event.target.getBoundingClientRect().top;
      var xsau=event.clientX;
      var ysau=event.clientY;

    
      // Set the position of the dragged element
      draggedElement.style.position = 'absolute';
      // draggedElement.style.height = draggedElement.offsetHeight+ offsetX - draggedElement.offsetHeight + 'px';
      // draggedElement.style.width = draggedElement.offsetWidth+ offsetX -draggedElement.offsetWidth + 'px';
      draggedElement.style.height = offsetX  + 'px';
      draggedElement.style.width = offsetX +'px';
    
      // Append the dragged element to the drop area
      event.target.appendChild(draggedElement);
    }
    if(draggingElements=='rotate'){
      var offsetX = event.clientX - event.target.getBoundingClientRect().left;
      var offsetY = event.clientY - event.target.getBoundingClientRect().top;

      var xdau=event.target.getBoundingClientRect().left;
      var ydau=event.target.getBoundingClientRect().top;
      var xsau=event.clientX;
      var ysau=event.clientY;

    
      // Set the position of the dragged element
      draggedElement.style.position = 'absolute';
      var min=1000;
      var degree=0;
      for(let i=0;i<=360;i++){
        draggedElement.style.transform = 'rotate('+ i +'deg)';
        var khacx=document.getElementById('rotate').getBoundingClientRect().left-xsau;
        var khacy=document.getElementById('rotate').getBoundingClientRect().top-ysau;
        if(min>(Math.abs(khacx)+Math.abs(khacy))){
          min=(Math.abs(khacx)+Math.abs(khacy));
          degree=i;
        }
      }
      draggedElement.style.transform = 'rotate('+ degree +'deg)';
    
      // Append the dragged element to the drop area
      event.target.appendChild(draggedElement);
    }
    if(draggingElements=='image'){
      var offsetX = event.clientX - event.target.getBoundingClientRect().left;
      var offsetY = event.clientY - event.target.getBoundingClientRect().top;
      var xsau=event.clientX;
      var ysau=event.clientY;
    
      
      // Set the position of the dragged element
      draggedElement.style.position = 'absolute';
      // draggedElement.style.left = offsetX - draggedElement.offsetWidth/2 + 'px';
      // draggedElement.style.top = offsetY - draggedElement.offsetHeight/2 + 'px';
      draggedElement.style.left = xsau - draggedElement.offsetWidth/2 + 'px';
      draggedElement.style.top = ysau - draggedElement.offsetHeight/2 + 'px';
    
      // Append the dragged element to the drop area
      event.target.appendChild(draggedElement);
    }
  }
  