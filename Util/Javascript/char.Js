new Chart(document.getElementById('circleChart'), {
type: 'doughnut',
data: {
labels: ['Comptes', 'Commentaires'],
datasets: [{
data: [totalComptes, totalAvis],
backgroundColor: ['#2196f3', '#ffca28'],
hoverBackgroundColor: ['#1976d2', '#fbc02d'],
borderWidth: 0
}]
},
options: {
cutout: '70%',
responsive: false,
plugins: {
 legend: { display: false },
 tooltip: {
  backgroundColor: '#333',
  titleColor: '#fff',
  bodyColor: '#eee'
}
 },
animation: {
  animateRotate: true,
  animateScale: true
  }
 }
});