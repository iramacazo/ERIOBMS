window.onload = function() {

    var texty = "Budget for " + budgetdata["academic_year"];
    var totalbudget = 0;
    totalbudget += parseFloat(budgetdata['supplies']);
    totalbudget += parseFloat(budgetdata['transportation']);
    totalbudget += parseFloat(budgetdata['mailing']);
    totalbudget += parseFloat(budgetdata['meeting_expenses']);
    totalbudget += parseFloat(budgetdata['workshop']);
    totalbudget += parseFloat(budgetdata['mimeo']);
    totalbudget += parseFloat(budgetdata['telephone']);
    totalbudget += parseFloat(budgetdata['repairs_and_maintenance']);
    totalbudget += parseFloat(budgetdata['publication']);
    totalbudget += parseFloat(budgetdata['uniform']);
    totalbudget += parseFloat(budgetdata['international_travel']);
    totalbudget += parseFloat(budgetdata['representation']);
    totalbudget += parseFloat(budgetdata['tokens']);
    totalbudget += parseFloat(budgetdata['commitments_official']);
    totalbudget += parseFloat(budgetdata['membership']);
    totalbudget += parseFloat(budgetdata['internationalization_programs']);
    totalbudget += parseFloat(budgetdata['activities']);
    totalbudget += parseFloat(budgetdata['capex']);
    totalbudget += parseFloat(budgetdata['orientation_programs']);
    totalbudget += parseFloat(budgetdata['commitments_student']);
    // Formats the numbers
    console.log(totalbudget.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: texty
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00\"%\"",
            indexLabel: "{label} {y}",
            dataPoints: [
                {y: 79.45, label: "Remaining Budget"},
                {y: 7.31, label: "Term 1"},
                {y: 7.06, label: "Term 2"},
                {y: 4.91, label: "Term 3"}
            ]
        }]
    });
    chart.render();

};