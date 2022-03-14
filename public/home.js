setInterval(changeBackground, 12000);
let bodyClass = document.body.classList;

function changeBackground() {
  if (bodyClass.contains('bg-image-1')) {
    bodyClass.replace('bg-image-1', 'bg-image-2');
    document.querySelector("#image-1-credits").classList.add('hidden');
    document.querySelector("#image-2-credits").classList.remove('hidden');
  }
  else if (bodyClass.contains('bg-image-2')) {
    bodyClass.replace('bg-image-2', 'bg-image-3');
    document.querySelector("#image-2-credits").classList.add('hidden');
    document.querySelector("#image-3-credits").classList.remove('hidden');
  }
  else if (bodyClass.contains('bg-image-3')) {
    bodyClass.replace('bg-image-3', 'bg-image-4');
    document.querySelector("#image-3-credits").classList.add('hidden');
    document.querySelector("#image-4-credits").classList.remove('hidden');
  }
  else if (bodyClass.contains('bg-image-4')) {
    bodyClass.replace('bg-image-4', 'bg-image-5');
    document.querySelector("#image-4-credits").classList.add('hidden');
    document.querySelector("#image-5-credits").classList.remove('hidden');
  }
  else if (bodyClass.contains('bg-image-5')) {
    bodyClass.replace('bg-image-5', 'bg-image-1');
    document.querySelector("#image-5-credits").classList.add('hidden');
    document.querySelector("#image-1-credits").classList.remove('hidden');
  } 
  else {
    bodyClass.add('bg-image-1');
    document.querySelector("#image-1-credits").classList.remove('hidden');
  }
}
