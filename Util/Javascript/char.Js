new Chart(document.getElementById('circleChart'), {
type: 'doughnut',
data: {
labels: ['Comptes', 'Commentaires'],
datasets: [{
data: [totalComptes, totalAvis],
backgroundColor: ['#004A7E', '#669c24'],
hoverBackgroundColor: ['#004A7E', '#669c24'],
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