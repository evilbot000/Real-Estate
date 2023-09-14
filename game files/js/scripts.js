// navbar script

let navbar = document.querySelector('.links');

let header = document.querySelector('header');

document.querySelector('#menu-btn').onclick = () =>{
	navbar.classList.toggle('active');
	header.classList.toggle('active');
}

// change background color of navbar on scroll

function change() {
	var nav = document.getElementById('nav');

	var value=window.scrollY;

	if (value>80) 
	{
		nav.classList.add('nav-change');
	}
	else
	{
		nav.classList.remove('nav-change');
	}
}

window.addEventListener('scroll',change);