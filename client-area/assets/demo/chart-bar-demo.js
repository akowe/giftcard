new Chart(document.getElementById("myBarChart"), {
  type: 'bar',
  data: {
    labels: ['Google', 'Amazon', 'Steam', 'iTunes', 'Ebay', 'Nike', 'Sephora'],
    datasets: [{
      label: '',
      backgroundColor: 'rgba(2,117,216,1)',
      data: [56, 13, 27, 68, 42, 50, 71]
    }]
  },
  options: {
    title: {
      display: false,
      text: ''
    },
    tooltips: {
      mode: 'index',
      intersect: false
    },
    responsive: true,
    scales: {
      xAxes: [{
        stacked: false
      }],
      yAxes: [{
        stacked: false
      }]
    },
    plugins: {
      datalabels: {
        align: 'end',
        anchor: 'end',
        backgroundColor: function(context) {
          return context.dataset.backgroundColor;
        },
        borderRadius: 4,
        color: 'white',
        formatter: function(value){
          return value + ' (100%) ';
        }
      }
    }
  }
});