
window.addEventListener('load',function(){
	const canvas = document.getElementById('canvas1');
	const ctx =canvas.getContext('2d');
	//en lugar de window.innerWidth establecemos un número fijo(1000) para que siempre tenga
	//las mismas dimensiones, tanto en la acción de resize() como cargando desde cualquier resolución
	canvas.width = 1800;
	canvas.height = window.innerHeight;
	let counter1 = 0;
	const image1 = document.getElementById('image1');
	console.log("image1: ",image1)
	//añadimos los parámetros x, y que serán el origen y el color
	class Particle {
		constructor(effect,x,y,color){
			//this.x = 50;
			this.effect = effect;
			//this.x = Math.random() * canvas.width;
			this.x = Math.random() * this.effect.width;
			//this.x = x;
			//this.y = 150;
			this.y = Math.random() * this.effect.height;
			//this.y = y;
			
			//origen
			this.originX = Math.floor(x);
			this.originY = Math.floor(y);
			this.color = color;
			this.size = this.effect.gap;
			//this.vx = 1;
			//this.vy = 1;
			//velocidad:
			//this.vx = 1;
			//this.vy = 1;
			//velocidad aleatoria:
			//(esta velocidad junto al cambio de posición en el método update() permiten realizar
			//la animación)
			//con x el valor negativo se mueve hacia la izquierda, positivo a la derecha
			//con y el valor negativo se mueve hacia abajo, positivo hacia arriba
			//this.vx = Math.random() * 2 -1;
			this.vx = 0;
			//this.vy = Math.random() * 2 -1;
			this.vy = 0;
			/*
			this.ease = 0.2;

			this.friction = 0.95;
			this.dx = 0;
			this.dy = 0;
			this.distance = 0;
			this.force = 0;
			this.angle = 0;
			*/
		}

		draw(context){
			context.fillStyle = this.color;
			context.fillRect(this.x,this.y,this.size,this.size);
		}
		update(){
			//si se modifica el decimal es posible que sea necesario modificar el número 
			//del condicional del counter1 en la línea 181
			this.x += (this.originX - this.x)*0.1;
			this.y += (this.originY - this.y) * 0.1;
			/*
			this.dx = this.effect.mouse.x - this.x;
			this.dy = this.effect.mouse.y - this.y;
			this.distance = Math.sqrt((this.dx * this.dx) + (this.dy * this.dy));
			this.force = -this.effect.mouse.radius / this.distance;
			if(this.distance < this.effect.mouse.radius){
				//Math.atan2 devuelve un valor numérico en radianes entre -PI y +PI
				this.angle = Math.atan2(this.dy,this.dx);
				this.vx += this.force * Math.cos(this.angle);
				this.vy += this.force * Math.sin(this.angle);
			}
			//this.x += this.vx;
			//this.x += (this.originX - this.x) * 0.1;			
			//this.x += this.vx + (this.originX - this.x) * this.ease;
			this.x += (this.vx *= this.friction) + (this.originX - this.x) * this.ease;
			//this.y += this.vy;
			//this.y += (this.originY - this.y) * 0.1;
			//this.y += this.vy + (this.originY - this.y) * this.ease;
			this.y += (this.vy *= this.friction) + (this.originY - this.y) * this.ease;
			*/
		}
		/*
		warp(){
			this.x = Math.random() * this.effect.width;
			this.y = Math.random() * this.effect.height;
			this.ease = 0.05;
		}
		*/
	}

	class Effect {
		constructor(width,height){
			this.width = width;
			this.height = height;
			this.particlesArray = [];
			this.image = document.getElementById('image1');
			//console.log(this.image.width);
			/*
			this.centerX = this.width * 0.34;
			this.centerY = this.height * 0.34;
			this.x = this.centerX - this.image.width * 0.34;
			this.y = this.centerY - this.image.height * 0.34;
			*/
			this.centerX = this.width * 0.5;
			this.centerY = this.height * 0.5;
			this.x = this.centerX - this.image.width * 0.5;
			this.y = this.centerY - this.image.height * 0.5;
			//para que la animación sea fluida sin optimizaciones más avanzadas,
			//debemos dar un rango de píxeles que salte la coordenada hacia abajo y a derecha,
			//en lugar de uno por uno. Esta variable la llamamos gap
			this.gap = 4;
			/*
			this.mouse = {
				radius: 200,
				x:undefined,
				y:undefined
			}
			*/
			/*
			window.addEventListener('mousemove',event=>{
				this.mouse.x = event.x;
				this.mouse.y = event.y;
				//console.log(this.mouse.x,this.mouse.y)
			})
			*/
		}
		init(context){
			/*
			for(let i = 0; i<100;i++){
				this.particlesArray.push(new Particle(this))	
			}
			*/
			context.drawImage(this.image,this.x,this.y);
			const pixels = context.getImageData(0,0,this.width,this.height).data;
			//Recorremos píxel por píxel mediante bucles anidados (y, x), pero 
			//comprobamos solo cada 4 valores del array, ya que si ese valor es 0
			//indica que es transparente y no es necesario agregar al nuevo array
			//esos 4 valores.
			//El nuevo array de partículas que crearemos será necesario para realizar 
			//la animación
			for(let y = 0;y < this.height; y += this.gap){
				for(let x = 0;x < this.width; x += this.gap){
					const index = (y * this.width + x) * 4;
					const red = pixels[index];
					const green = pixels[index + 1];
					const blue = pixels[index + 2];
					const alpha = pixels[index + 3];
					const color = 'rgb(' + red +','+ green + ',' + blue +')';
					//si de cada cuatro valores el cuarto valor es mayor a 0 
					//crearemos la partícula
					if(alpha > 0){
						this.particlesArray.push(new Particle(this,x,y,color));
					}
				}
			}
			console.log(pixels)
		}
		draw(context){
			this.particlesArray.forEach(particle => particle.draw(context));
			
		}
		update(){
			//prueba de movimiento del lienzo hacia la derecha 
			//this.x++;
			this.particlesArray.forEach(particle => particle.update());
		}
		//efecto teletransporte
		/*
		warp(){
			this.particlesArray.forEach(particle => particle.warp());
		}
		*/

	}

	const effect = new Effect(canvas.width,canvas.height);
	effect.init(ctx);

	console.log(effect)
	function animate(){
		//En la animación tb se muestran los cuadros antiguos, para solo mostrar los cuadros de animación actuales
		//debemos eliminar el lienzo con clearRect()S
		ctx.clearRect(0,0,canvas.width,canvas.height);
		effect.draw(ctx);
		//para solo mostrar el efecto al cargar la página evitamos la sobrecarga del navegador
		if(counter1 <= 100){
			
			effect.update();
			requestAnimationFrame(animate);
			counter1++;	
		}
		
		
	}
	animate();
	//ctx.fillRect(120,150,100,200);
	//ctx.drawImage(image1,100,200,400,300)

	//warp button
	/*
	const warpButton = document.getElementById('warpButton');
	warpButton.addEventListener('click',()=>{
		effect.warp();
	})
	*/
})

