window.addEventListener('load', function(){
	//store tabs variables
	var tabs = document.querySelectorAll('ul.nav-tabs > li');

	for ( i = 0; i < tabs.length; i++ ){
		tabs[i].addEventListener('click', switchTab);
	}

	function switchTab(event){
		// console.log(event);
		event.preventDefault();
		
		document.querySelector('ul.nav-tabs li.active').classList.remove('active');
		document.querySelector('.tab-pane.active').classList.remove('active');

		var clickedTab = event.currentTarget; //<li>
		var anchor = event.target; //<a href="...">
		var activePanelID = anchor.getAttribute('href'); //#tab-...

		clickedTab.classList.add('active');
		document.querySelector(activePanelID).classList.add('active');
		// console.log(activePanelID);
		
	}
});