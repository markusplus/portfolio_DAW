const rellenaTabla = (columnas, valores) => {
  const table = document.createElement("table");
  // Creamos la cabecera de la tabla

  const headerRow = document.createElement("tr");
  columnas.forEach((column) => {
    const th = document.createElement("th");
    th.textContent = column;
    headerRow.appendChild(th);
  });

  table.appendChild(headerRow);
  // Creamos las filas de las tablas

  valores.forEach((row) => {
    const tr = document.createElement("tr");
    row.forEach((value) => {
      const td = document.createElement("td");
      td.textContent = value;
      tr.appendChild(td);
    });
    table.appendChild(tr);
  });
  // Añadimos las etiquetas HTML de la tabla al body
  document.body.appendChild(table);
}

const capitalizar = (str) => {
  return str.replace(/....-(.)/g, (match, char) => {
    return char.toUpperCase();
  });
};

var Dataframe = dfjs.DataFrame;
promesa = Dataframe.fromCSV(
  "https://raw.githubusercontent.com/plotly/datasets/master/iris.csv"
)
  .then((df) => {
    var df2 = df
      .cast("SepalLength", parseFloat).rename("SepalLength", "Sepal.Length")
      .cast("SepalWidth", parseFloat).rename("SepalWidth", "Sepal.Width")
      .cast("PetalLength", parseFloat).rename("PetalLength", "Petal.Length")
      .cast("PetalWidth", parseFloat).rename("PetalWidth", "Petal.Width")
      .rename("Name", "Species");

    df2 = df2.withColumn("Species", (row) => capitalizar(row.get("Species")));

    const mediaSepalLength = df2
      .groupBy("Species")
      .aggregate(
        (group) => (Math.round(group.stat.mean("Sepal.Length") * 100) / 100)
      )
      .rename("aggregation", "mean SLength");
    const mediaSepalWidth = df2
      .groupBy("Species")
      .aggregate(
        (group) => (Math.round(group.stat.mean("Sepal.Width") * 100) / 100)
      )
      .rename("aggregation", "meanSWidth");
    const mediaPetalLength = df2
      .groupBy("Species")
      .aggregate(
        (group) => (Math.round(group.stat.mean("Petal.Length")* 100)/ 100)
      )
      .rename("aggregation", "meanPLength");
    const mediaPetalWidth = df2
      .groupBy("Species")
      .aggregate(
        (group) => (Math.round(group.stat.mean("Petal.Width")*100)/ 100)
      )
      .rename("aggregation", "meanPWidth");

    const df3 = mediaSepalLength
      .join(mediaSepalWidth, "Species")
      .join(mediaPetalLength, "Species")
      .join(mediaPetalWidth, "Species");

    var columnas = df3.listColumns();
    var valores = df3.toArray();

    rellenaTabla(columnas, valores);

    const plot_data = (df, col) => {
      div = document.createElement("div");
      div.id = "myDiv";
      var datos = [
        {
            y: df.filter(row => row.get("Species") == "Setosa")
                  .select(col).toArray().flat(),
            type: "box",
            name: "Setosa"
        },
        {
            y: df.filter(row => row.get("Species") == "Versicolor")
                    .select(col).toArray().flat(),
              type: "box",
              name: "Versicolor"
        },
        {
            y: df.filter(row => row.get("Species") == "Virginica")
                    .select(col).toArray().flat(),
              type: "box",
              name: "Virginica"
        },
      ]

      var diseño = {
        title: `Boxplot de ${col}`,
        xaxis: {
          title: "Planta"
        },
        yaxis: {
          title: "Valor"
        }
      };
      Plotly.newPlot(div, datos, diseño);
      document.body.appendChild(div);
    }

    plot_data(df2, "Sepal.Length");
    plot_data(df2, "Sepal.Width");
    plot_data(df2, "Petal.Length");
    plot_data(df2, "Petal.Width");
    
  }).catch((err) => {
    console.log(err);
  });
