// if placeholder isn't supported:
if (!Modernizr.input.placeholder){
  // use a input hint script
	setInputHint(document.getElementById('name'),'Name*');
	setInputHint(document.getElementById('location'),'Location*');
	setInputHint(document.getElementById('bedrooms'),'Number of Bedrooms*');
	setInputHint(document.getElementById('bathrooms'),'Number of Bathrooms*');
	setInputHint(document.getElementById('condition'),'Condition*');
	setInputHint(document.getElementById('price'),'Price*');
	setInputHint(document.getElementById('description'),'Sale Description*');
	setInputHint(document.getElementById('userfile'),'File Location*');
}