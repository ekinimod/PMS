	
/**
 * Recherche tout les objets de CLASS= clickme & leurs associe une fonction
 */
//$('.clickme').click(function() {
////	alert('You clicked on something.');
//});



$('.btnSearch').click(function(){
//    alert("btnSearch");
});
 
$('form').submit(function(e){
//   alert("Submit");
});





/*******************************************************************************
 * Formulaire Calcul Surface
 ******************************************************************************/

 
(function ($) {
    // Renvoi un array contenant le detail de currentForme
    $.MyNamespace = $.MyNamespace || {};
    $.MyNamespace.getArraySurfaces = function (currentForme) {

	var arraySurfaces = new Array();
	arraySurfaces['Carre'] = new Array('Carré;', Math.pow(a,2)*Math.PI, new Array('a'));
	arraySurfaces['Rect'] = new Array('Rectangle', a*b, new Array('a', 'b'));
	arraySurfaces['Triangle'] = new Array('Triangle', (a*h)/2,  new Array('a', 'b'));
	arraySurfaces['TriEquInsc'] = new Array('Triangle Equilatéral Inscrit', '((1/2)*Math.pow(a,2))*a',  new Array('a'));
	arraySurfaces['Trapeze'] = new Array('Trapèze', 'arrondi(((b*B)/2)/h,4)',  new Array('a', 'b'));
	arraySurfaces['Parallelo'] = new Array('Parallelogramme', 'arrond',  new Array('a', 'b'));
	arraySurfaces['QuadrilCirc'] = new Array('Quadrilatère Circonscrit', 'arrond', new Array('a', 'b'));
	arraySurfaces['QuadrilInsc'] = new Array('Quadrilatère Inscrit', 'arrond', new Array('a', 'b'));
	arraySurfaces['PolyRegul2P'] = new Array('Polygonne Régulier 2P', 'arrond', new Array('a', 'b'));
	arraySurfaces['PolyRegulNC'] = new Array('Polygonne Régulier NC', 'arrond',  new Array('a', 'b'));
	arraySurfaces['Losange'] = new Array('Losange', 'arrond', new Array('a', 'b'));
	arraySurfaces['Cercle'] = new Array('Cercle', 'arrond', new Array('a', 'b'));
	arraySurfaces['Couronne'] = new Array('Couronne', 'arrond', new Array('a', 'b'));
	arraySurfaces['Cylindre'] = new Array('Cylindre', 'arrond', new Array('a', 'b'));
	arraySurfaces['Ellipse'] = new Array('Ellipse', 'arrond', new Array('a', 'b'));
	arraySurfaces['Fuseau'] = new Array('Fuseau', 'arrond', new Array('a', 'b'));
	arraySurfaces['Calotte'] = new Array('Calotte', 'arrond', new Array('a', 'b'));
	arraySurfaces['SecteurAng'] = new Array('Secteur Angulaire', 'arrond', new Array('a', 'b'));
	arraySurfaces['SectSpheriq'] = new Array('Secteur Spherique', 'arrond', new Array('a', 'b'));
	arraySurfaces['SegmCircul'] = new Array('Segment Circulaire', 'arrond',  new Array('a', 'b'));
	arraySurfaces['SegmSpheriq'] = new Array('Segment Spherique', 'arrond',new Array('a', 'b'));
	arraySurfaces['Surf_Tore'] = new Array('Tore', 'arrond', new Array('a', 'b'));
	arraySurfaces['SurfRevol'] = new Array('Surf de révolution', 'arrond', new Array('a', 'b'));
	arraySurfaces['Cone'] = new Array('Cône', 'arrond',  new Array('a', 'b'));
	arraySurfaces['TroncCone'] = new Array('Tronc de Cône', 'arrond', new Array('a', 'b'));
	arraySurfaces['Sphere'] = new Array('Sphère', 'arrond', new Array('a', 'b'));
	
    return arraySurfaces[currentForme];
    }
})($);

$(function() {

	$("#LEBTNCALCUL").click(function() {
		var currentForme = 'Carre';
//		alert(currentForme);
		var a=	5;
		var valcalc=(((1/2)*Math.pow(a,2))*2);
//		alert('arrondi '+valcalc);
	});

	$('.selector').click(function() {
		var currentForme = $(this).attr('id');
		alert(currentForme);
		var arraySurfaces = $.MyNamespace.getArraySurfaces (currentForme);

		var Libelle = arraySurfaces[0];
		var Formule = arraySurfaces[1];
		var ficFormul = 'FrmSurf_'+currentForme+'.jpg';
		var ficSch = 'SchSurf_'+currentForme+'.jpg';
		var arrayParam = arraySurfaces[2];
		
		$('.LETITRE').text(Libelle);
		$('.LERESULTAT').text('La surface du \n' + Libelle);
		$('.LEDESSIN').css("background-image", 'url(/appli/Formulr/Images/' + ficSch + ')');
		$('.LAFORMULE').css("background-image", 'url(/appli/Formulr/Images/' + ficFormul + ')');

		var len =arrayParam.length;
		for ( var key in arrayParam) {
			$('#param' + key).text(arrayParam[key] + ' : ');
			$('#input' + key).css("visibility", "visible");
		}
	});
});

