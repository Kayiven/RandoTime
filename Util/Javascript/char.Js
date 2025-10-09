new Chart(document.getElementById('circleChart'), {
type: 'doughnut',
data: {
labels: ['Participate', 'Commentaires', 'Compte'],
datasets: [{
data: [total_participations, totalAvis, total_compte],
backgroundColor: ['#f0811f', '#669c24', '#004A7E'],
hoverBackgroundColor: ['#f0801fdd', '#669c24d0', '#00497ebe'],
borderWidth: 1
}]
},
options: {
cutout: '70%',
responsive: false,
plugins: {
legend: { display: false },
tooltip: {
callbacks: {
label: function(context) {
// show actual count
return context.label + ': ' + context.raw;
}}}
}}
});