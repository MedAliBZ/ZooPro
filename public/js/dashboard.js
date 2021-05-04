google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    

    var data = google.visualization.arrayToDataTable([
        ['Role', 'Nombre'],
        ['Admine', document.getElementById('roles').getAttribute('admins')*1],
        ['Utilisateur Simple', document.getElementById('roles').getAttribute('users')*1]
    ]);

    var options = {
        title: 'Role par utilisateur',
        height: 300
    };

    var chart = new google.visualization.PieChart(document.getElementById('roles'));

    chart.draw(data, options);

    data = google.visualization.arrayToDataTable([
        ['Salaire', 'Nombre'],
        ['Salaire ≥ 1500', document.getElementById('employes').getAttribute('sup')*1],
        ['Salaire < 1500', document.getElementById('employes').getAttribute('inf')*1]
    ]);

    options = {
        title: 'Salaire supérieur à 1500',
        pieHole: 0.4,
        height: 300,
        slices: {
            1: { offset: 0.2 },
        }
    };

    chart = new google.visualization.PieChart(document.getElementById('employes'));
    chart.draw(data, options);

    data = google.visualization.arrayToDataTable([
        ['Status de conservation', 'Nombre'],
        ['Stable', document.getElementById('animalchart').getAttribute('stable')*1],
        ['Menacé', document.getElementById('animalchart').getAttribute('menace')*1],
        ['En danger', document.getElementById('animalchart').getAttribute('endanger')*1]
    ]);

    options = {
        title: 'Status de conservation supérieur des Animaux',
        pieHole: 0.4,
        height: 300,
        slices: {
            0: { offset: 0 , color: '#007c6c' },
            1: { offset: 0 ,color: 'rgb(242,121,0)'},
            2: { offset: 0 , color: 'rgb(191,0,0)' },
            
        }
    };

    chart = new google.visualization.PieChart(document.getElementById('animalchart'));
    chart.draw(data, options);

    data = google.visualization.arrayToDataTable([
        ["TYPE", "" ,{ role: 'style' }],
        ["herbivore", document.getElementById('Regimechart').getAttribute('herbivore') * 1,'#fa7b62'],
        ["omnivore", document.getElementById('Regimechart').getAttribute('omnivore') * 1,'#b18845'],
        ["carnivore", document.getElementById('Regimechart').getAttribute('carnivore') * 1,'#4e77ba '],
        ["frugivore", document.getElementById('Regimechart').getAttribute('frugivore') * 1,'#733635'],
        ["granivore", document.getElementById('Regimechart').getAttribute('granivore') * 1,'#9c8aa4']
      ]);
    
    
    options = {
        title: "types de régime alimentaire",
        height: 300,
        bar: { groupWidth: "95%" 
      },
      legend: { position: 'none' },
    
    
      };

    chart = new google.visualization.BarChart(document.getElementById("Regimechart"));
    chart.draw(data, options);

    data = google.visualization.arrayToDataTable([
        ['Salaire', 'Nombre'],
        ['hauteur ≥ 100', document.getElementById('espece').getAttribute('sup')*1],
        ['hauteur < 100', document.getElementById('espece').getAttribute('inf')*1]
    ]);

    options = {
        title: 'Hauteur des éspéces',
        pieHole: 0.4,
        height: 300,
        slices: {
            1: { offset: 0.1 },
        }
    };

    chart = new google.visualization.PieChart(document.getElementById('espece'));
    chart.draw(data, options);

    data = google.visualization.arrayToDataTable([
        ['Salaire', 'Nombre'],
        ['Taille ≥ 1500', document.getElementById('enclos').getAttribute('sup')*1],
        ['Taille < 1500', document.getElementById('enclos').getAttribute('inf')*1]
    ]);

    options = {
        title: 'Taille des enclos',
        pieHole: 0.4,
        height: 300,
        slices: {
            1: { offset: 0.1 },
        }
    };

    chart = new google.visualization.PieChart(document.getElementById('enclos'));
    chart.draw(data, options);
}