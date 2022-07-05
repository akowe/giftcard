// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Exampl

ctx = document.getElementById('myPieChart').getContext('2d');
chart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      label: 'Colors',
      data: [9, 8, 7, 6, 5, 4, 3],
      backgroundColor: ["#2ECC40", "#333333", "#7FDBFF", "#ffc107", "#0074D9", "#FF4136",   "#AAAAAA", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111"]
    }],
    labels: ['Google','Amadon','Steam','iTunes','Ebay','Nike','Sephora']
  },
  options: {
    responsive: true,
    title:{
      display: true,
      text: "Color test"
    }
  }
});
