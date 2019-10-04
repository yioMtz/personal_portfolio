document.addEventListener('DOMContentLoaded', () => {
	// Get all "navbar-burger" elements
	const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

	// Check if there are any navbar burgers
	if ($navbarBurgers.length > 0) {
		// Add a click event on each of them
		$navbarBurgers.forEach((el) => {
			el.addEventListener('click', () => {
				// Get the target from the "data-target" attribute
				const target = el.dataset.target;
				const $target = document.getElementById(target);

				// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
				el.classList.toggle('is-active');
				$target.classList.toggle('is-active');
			});
		});
	}
});

document.addEventListener('DOMContentLoaded', () => {
	var navLinks = document.querySelectorAll('.closeNav');
	const menu = document.getElementsByClassName('navbar-burger')[0];
	navLinks.forEach((link) => {
		link.addEventListener('click', (event) => {
			event.preventDefault();
			let targetID = link.dataset.link;
			const targetAnchor = document.querySelector(targetID);
			if (menu.classList.contains('is-active')) {
				// Get the target from the "data-target" attribute
				const $target = document.getElementById(menu.dataset.target);
				//close navbar if open on mobile
				menu.classList.toggle('is-active');
				$target.classList.toggle('is-active');
				setTimeout(function() {
					scrollTo(targetAnchor, targetID);
				}, 100);
			} else {
				scrollTo(targetAnchor, targetID);
			}
		});
	});
});

function scrollTo(targetAnchor, targetID) {
	const distanceToTop = (el) => Math.floor(el.getBoundingClientRect().top);
	if (!targetAnchor) return;
	const originalTop = distanceToTop(targetAnchor);
	window.scrollBy({ top: originalTop, left: 0, behavior: 'smooth' });
	const checkIfDone = setInterval(function() {
		const atBottom = window.innerHeight + window.pageYOffset >= document.body.offsetHeight - 2;
		if (distanceToTop(targetAnchor) === 0 || atBottom) {
			targetAnchor.tabIndex = '-1';
			targetAnchor.focus();
			window.history.pushState('', '', targetID);
			clearInterval(checkIfDone);
		}
	}, 100);
}
