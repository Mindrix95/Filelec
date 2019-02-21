function updatePrix(prix, sender)
{
	qtt = 0;
	if(sender)
	{
		//sender 1
		qtt = document.getElementById("qtt1").value;
		document.getElementById("qtt0").value = qtt;
		document.getElementById("quantite").value = qtt;
	}
	else
	{
		//sender 0
		qtt = document.getElementById("qtt0").value;
		document.getElementById("qtt1").value = qtt;
		document.getElementById("quantite").value = qtt;
	}
	newprix = qtt*prix;
	paniers = document.getElementsByClassName("panier");
	[].forEach.call(paniers, function(panier)
	{
		panier.innerHTML = newprix+"€";
	});
	updateTotal();
}

function inclus()
{
	btn = document.getElementById('inclus');
	inp = document.getElementById('inpinclus');
	forminclu = document.getElementById('forminclu');
	etat = btn.textContent;
	console.log(etat);
	if(etat == "Inclure")
	{
		inp.value = "1";
		btn.textContent = "Ne pas inclure";
		forminclu.textContent = "Annuler";
		document.getElementById("affprixservice").style.display="inline";
	}
	else
	{
		inp.value = "0";
		btn.textContent = "Inclure";
		forminclu.textContent = "Inclure l'installation";
		document.getElementById("affprixservice").style.display="none";
	}
	updateTotal();
}

function updateTotal()
{
	prixP = document.getElementById("prixproduit");
	prixS = document.getElementById("prixservice");
	prixT = document.getElementById("prixtotal");
	
	console.log(prixP.innerHTML);
	console.log(getComputedStyle(prixS, null).display);
	
	if(getComputedStyle(prixS, null).display == "none")
	{
		prixT.innerHTML = prixP.innerHTML;
	}
	else
	{
		prixT.innerHTML = parseFloat(prixP.innerHTML, 10) + parseFloat(prixS.innerHTML, 10);	
	}	
}