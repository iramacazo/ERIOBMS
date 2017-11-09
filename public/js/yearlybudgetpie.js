window.onload = function() {

    console.log(termdata["term1"]);
    var texty = "Budget for A.Y. " + budgetdata["academic_year"] + " - "+ (parseInt(budgetdata["academic_year"]) + 1);
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
    $("#totalbudget").text("Total Budget: P" + totalbudget.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    console.log();

    var term1 = (parseFloat(termdata["term1"]) / totalbudget) * 100;
    var term2 = (parseFloat(termdata["term2"]) / totalbudget) * 100;
    var term3 = (parseFloat(termdata["term3"]) / totalbudget) * 100;
    var spent = ((parseFloat(termdata["term1"]) +
        parseFloat(termdata["term2"]) + parseFloat(termdata["term3"])));
    var remaining = ((totalbudget - spent) / totalbudget) * 100;
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: texty
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00\"%\"",
            toolTipContent: "{label}: <strong>P{x}</strong>",
            indexLabel: "{label}: {y}",
            dataPoints: [
                {y: remaining, x: totalbudget - spent, label: "Remaining Budget"},
                {y: term1, x: parseFloat(termdata["term1"])
                    , label: "Term 1"},
                {y: term2, x: parseFloat(termdata["term2"])
                    , label: "Term 2"},
                {y: term3, x: parseFloat(termdata["term3"])
                    ,label: "Term 3"}
            ]
        }]
    });
    chart.render();

    $(".category").click(function () {
        $("#dd-menu-button").text(this.text);
        $("#chartContainer2").show();
        $("#categorySplash").hide();

        var total = parseFloat(budgetdata[this.name]);
        var term1 = parseFloat(categorybudget[this.name]["term1"]);
        var term2 = parseFloat(categorybudget[this.name]["term2"]);
        var term3 = parseFloat(categorybudget[this.name]["term3"]);
        var texty =  this.text + " in A.Y. " + budgetdata["academic_year"] + " - "+
                    (parseInt(budgetdata["academic_year"]) + 1);

        $("#categorybudget").text("Total budget: P" + total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
        var remaining = total - (term1 + term2 + term3);

        var chart1 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                text: texty
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                toolTipContent: "{label}: <strong>P{x}</strong>",
                indexLabel: "{label}: {y}",
                dataPoints: [
                    {y: (remaining / total) * 100,
                        x: remaining, label: "Remaining Budget"},
                    {y: (term1 / total) * 100,
                        x: term1, label: "Term 1"},
                    {y: (term2 / total) * 100,
                        x: term2, label: "Term 2"},
                    {y: (term3 / total) * 100,
                        x: term3, label: "Term 3"}
                ]
            }]
        });
        chart1.render();
    });
};