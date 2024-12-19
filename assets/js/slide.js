
			/*alert("JESUS IS LORD FOREVER");*/

				var contentContainer = document.getElementById('contentContainer');
				var contentToShow = contentContainer.querySelectorAll('.content_show');

			contentToShow.forEach(function (content) {
				/* Find all corresponding skeleton loaders within the same parent*/

				var skeletonLoaders = content.parentElement.querySelectorAll('.skeleton-loader');

				/* Hide content initially */
				content.style.display = 'none';
				content.classList.remove('show');

				/* Show all skeleton loaders */
				skeletonLoaders.forEach(function (skeletonLoader) {
					if (skeletonLoader) {
						skeletonLoader.style.display = 'block';
					}
				});


				requestAnimationFrame(function () {
						setTimeout(function () {
							skeletonLoaders.forEach(function (skeletonLoader) {
								if (skeletonLoader) {
									skeletonLoader.style.display = 'none';
								}
							});


							content.style.display = 'flex';
							content.classList.add('show');
						}, 100);
				});
			});


		const languageModalClick = document.querySelector('.LG_right_icon');
		const languageModal = document.querySelector('.language_modal');
		const closeLanguageModal = document.querySelector('.close_btn');

		languageModalClick.addEventListener('click', function() {
			languageModal.classList.add('active');
		});

		closeLanguageModal.addEventListener('click', function() {
			languageModal.classList.remove('active');
		});

		window.addEventListener('click', function(o) {
			if(o.target == languageModal)
			{
				languageModal.classList.remove('active');
			}
		});

		window.addEventListener('keydown', function(r) {
				if(r.key === 'Escape')
				{
					languageModal.classList.remove('active');
				}
		});





		
		let slideIndex = 0;

		showSlides();
		function showSlides()
		{
			let i;
			let slides = document.getElementsByClassName("slide_show");
			for(i = 0; i < slides.length; i++)
			{
				slides[i].style.display = "none";
			}
			slideIndex++;
			if(slideIndex > slides.length)
			{
				slideIndex = 1;
			}
			slides[slideIndex-1].style.display = "block";

			setTimeout(showSlides, 5000);
		}
	