// const canvas = document.getElementById('canvas1');
// const ctx = canvas.getContext('2d');
// canvas.width = window.innerWidth;
// canvas.height = window.innerHeight;
// const particlesArray = [];

// window.addEventListener('resize', function() {
//   canvas.width = window.innerWidth;
//   canvas.height = window.innerHeight;
// });

// const mouse = {
//   x: undefined,
//   y: undefined,
// }

// canvas.addEventListener('click', function(event) {
//   mouse.x = event.x;
//   mouse.y = event.y;
// });

// canvas.addEventListener('mousemove', function(event) {
//   mouse.x = event.x;
//   mouse.y = event.y;
// });

// class Particle {
//   constructor() {
//     //this.x = mouse.x;
//     // this.y = mouse.y; 
//     this.x = Math.random() * canvas.width;
//     this.y = Math.random() * canvas.height;
//     this.size = Math.random() * 15 + 1;
//     this.speedX = Math.random() * 3 - 1.5;
//     this.speedY = Math.random() * 3 - 1.5;
//   }
//   update() {
//     this.x += this.speedX;
//     this.y += this.speedY;
//     if(this.size > 0.2) this.size -= 0.1
//   }
//   draw(){
//     ctx.fillStyle = 'red';
//     ctx.strokeStyle = '#333';
//     ctx.lineWidth = 3;
//     ctx.beginPath();
//     ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
//     ctx.fill();
//     ctx.stroke();
//   }
// }

// function init()
// {
//   for(let i = 0; i < 100; i++)
//   {
//       particlesArray.push(new Particle());
//   }
// }
// init();

// function handleParticles()
// {
//   for (let i = 0; i < particlesArray.length; i++)
//   {
//     particlesArray[i].update();
//     particlesArray[i].draw();
//     if(particlesArray[i].size <= 0.3)
//     {
//       particlesArray.splice(i, 1);
//       console.log(particlesArray.length);
//       i--;
//     }
//   }
// }
// console.log(particlesArray);

// function animate()
// {
//   ctx.clearRect(0, 0, canvas.width, canvas.height);
//   handleParticles();
//   requestAnimationFrame(animate);
// }


// animate();






// // 2 ////

// const canvas = document.getElementById('canvas1');
// const ctx = canvas.getContext('2d');
// canvas.width = window.innerWidth;
// canvas.height = window.innerHeight;
// const particlesArray = [];
// let hue = 0;

// window.addEventListener('resize', function() {
//   canvas.width = window.innerWidth;
//   canvas.height = window.innerHeight;
// });

// const mouse = {
//   x: undefined,
//   y: undefined,
// }

// canvas.addEventListener('click', function(event) {
//   mouse.x = event.x;
//   mouse.y = event.y;
//   for(let i = 0; i < 10; i++)
//   {
//     particlesArray.push(new Particle());
//   }
// });

// canvas.addEventListener('mousemove', function(event) {
//   mouse.x = event.x;
//   mouse.y = event.y;
//   for(let i = 0; i < 10; i++)
//   {
//     particlesArray.push(new Particle());
//   }
// });



// // Function to handle touchmove event
// canvas.addEventListener('touchmove', function(event) {
//   // Prevent default touch event behavior
//   event.preventDefault();
  
//   // Get touch coordinates relative to the canvas
//   const touch = event.touches[0];
//   mouse.x = touch.clientX;
//   mouse.y = touch.clientY;
  
//   // Create new particles when touch occurs
//   for(let i = 0; i < 10; i++) {
//     particlesArray.push(new Particle(mouse.x, mouse.y));
//   }
// });

// class Particle {
//   constructor() {
//     this.x = mouse.x;
//     this.y = mouse.y; 
//     // this.x = Math.random() * canvas.width;
//     // this.y = Math.random() * canvas.height;
//     this.size = Math.random() * 15 + 1;
//     this.speedX = Math.random() * 3 - 1.5;
//     this.speedY = Math.random() * 3 - 1.5;
//     this.color = 'hsl('+ hue + ',100%, 50%)';
//   }
//   update() {
//     this.x += this.speedX;
//     this.y += this.speedY;
//     if(this.size > 0.2) {this.size -= 0.1;}
//     if(this.size < (this.size - 1)) {ctx.fillStyle = 'red';ctx.fill();}
//   }
//   draw(){
//     ctx.fillStyle = this.color;
//     // ctx.strokeStyle = '#333';
//     ctx.lineWidth = 3;
//     ctx.beginPath();
//     ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
//     ctx.fill();
//     // ctx.stroke();
//   }
// }


// function handleParticles()
// {
//   for (let i = 0; i < particlesArray.length; i++)
//   {
//     particlesArray[i].update();
//     particlesArray[i].draw();
//     if(particlesArray[i].size <= 0.3)
//     {
//       particlesArray.splice(i, 1);
//       i--;
//     }
//   }
// }
// console.log(particlesArray);

// function animate()
// {

//   // tx.clearRect(0, 0, canvas.width, canvas.height);
//   ctx.fillStyle = 'rgba(0, 0, 0, 0.01)';
//   ctx.fillRect(0, 0, canvas.width, canvas.height);
//   handleParticles();
//   hue+=5;
//   requestAnimationFrame(animate);
// }


// animate();






// 3 ////

const canvas = document.getElementById('canvas1');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
const particlesArray = [];
let hue = 0;

window.addEventListener('resize', function() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});

const mouse = {
  x: undefined,
  y: undefined,
}

canvas.addEventListener('click', function(event) {
  mouse.x = event.x;
  mouse.y = event.y;
  for(let i = 0; i < 10; i++)
  {
    particlesArray.push(new Particle());
  }
});

canvas.addEventListener('mousemove', function(event) {
  mouse.x = event.x;
  mouse.y = event.y;
  for(let i = 0; i < 10; i++)
  {
    particlesArray.push(new Particle());
  }
});

// Function to handle touchmove event
canvas.addEventListener('touchmove', function(event) {
  // Prevent default touch event behavior
  event.preventDefault();
  
  // Get touch coordinates relative to the canvas
  const touch = event.touches[0];
  mouse.x = touch.clientX;
  mouse.y = touch.clientY;
  
  // Create new particles when touch occurs
  for(let i = 0; i < 2; i++) {
    particlesArray.push(new Particle(mouse.x, mouse.y));
  }
});

class Particle {
  constructor() {
    this.x = mouse.x;
    this.y = mouse.y; 
    this.size = Math.random() * 15 + 1;
    this.speedX = Math.random() * 3 - 1.5;
    this.speedY = Math.random() * 3 - 1.5;
    this.color = 'hsl('+ hue + ',100%, 50%)';
  }
  update() {
    this.x += this.speedX;
    this.y += this.speedY;
    if(this.size > 0.2) {this.size -= 0.01;}
    if(this.size < (this.size - 1)) {ctx.fillStyle = 'red';ctx.fill();}
  }
  draw(){
    ctx.fillStyle = this.color;
    // ctx.strokeStyle = '#333';
    ctx.lineWidth = 3;
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
    ctx.fill();
    // ctx.stroke();
  }
}


function handleParticles()
{
  for (let i = 0; i < particlesArray.length; i++)
  {
    particlesArray[i].update();
    particlesArray[i].draw();
    for(let j = i; j < particlesArray.length; j++)
    {
      const dx = particlesArray[i].x - particlesArray[j].x;
      const dy = particlesArray[i].y - particlesArray[j].y;
      const distance = Math.sqrt(dx * dx + dy * dy);
      if(distance < 100)
      {
        ctx.beginPath();
        ctx.strokeStyle = particlesArray[i].color;
        ctx.lineWidth = 0.2; /*particlesArray[i].size / 100;*/
        ctx.moveTo(particlesArray[i].x, particlesArray[i].y);
        ctx.lineTo(particlesArray[j].x, particlesArray[j].y);
        ctx.stroke();
      }
    }
    if(particlesArray[i].size <= 0.3)
    {
      particlesArray.splice(i, 1);
      i--;
    }
  }
}
console.log(particlesArray);

function animate()
{
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  // ctx.fillStyle = 'rgba(0, 0, 0, 0.02)';
  // ctx.fillRect(0, 0, canvas.width, canvas.height);
  handleParticles();
  hue+=5;
  requestAnimationFrame(animate);
}


animate();
