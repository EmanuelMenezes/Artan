demo = {
    initDashboardPageCharts: function() {



        /* ----------==========     Completed Tasks Chart initialization    ==========---------- */



        /* ----------==========     Emails Subscription Chart initialization    ==========---------- */

        var dataWebsiteViewsChart = {
            labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'A', 'N', 'D'],
            series: [
                [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 1756, 1895]

            ]
        };
        var optionsWebsiteViewsChart = {
            axisX: {
                showGrid: false
            },
            low: 0,
            high: 10000,
            chartPadding: {
                top: 0,
                right: 5,
                bottom: 0,
                left: 0
            }
        };
        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];
        var websiteViewsChart = Chartist.Bar('#websiteViewsCharts', dataWebsiteViewsChart, optionsWebsiteViewsChart, responsiveOptions);

        //start animation for the Emails Subscription Chart
        md.startAnimationForBarChart(websiteViewsChart);
    }
}