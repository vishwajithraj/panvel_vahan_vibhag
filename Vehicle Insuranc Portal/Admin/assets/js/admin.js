let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click", () => {
	nav.classList.toggle("navclose");
})

  const navOptions = document.querySelectorAll('.nav-option');


  navOptions.forEach(option => {
    option.addEventListener('click', function() {

      navOptions.forEach(opt => {
        opt.style.backgroundColor = '';
      });


      this.style.backgroundColor = '#088F8F';
    });
  });

    navOptions.forEach(option => {
      option.addEventListener('click', function() {
        navOptions.forEach(opt => opt.classList.remove('active-option'));


        this.classList.add('active-option');
      });
    });
  
    navOptions.forEach(option => {
			option.addEventListener('click', function() {

				navOptions.forEach(opt => opt.classList.remove('selected'));


				option.classList.add('selected');

				const img = option.querySelector('.nav-img');
				img.src = img.src.replace('#088F8F', '#fff');
			});
		});  

    navOptions.forEach(option => {
      option.addEventListener('click', function() {

        navOptions.forEach(opt => opt.classList.remove('selected'));

        option.classList.add('selected');
      });
    });

    navOptions.forEach(option => {
      option.addEventListener('click', function() {
        navOptions.forEach(opt => {
          opt.classList.remove('selected');
          opt.querySelector('h4').style.color = '';
        });
        option.classList.add('selected');
        option.querySelector('h4').style.color = '#fff';
      });
    });



  
  
  
  
  
      
  
