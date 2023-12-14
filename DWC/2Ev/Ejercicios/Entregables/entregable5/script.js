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

function capitalizar(palabra) {
  return palabra.replace("-", (match) => match.charAt(1).toUpperCase());
}

var Dataframe = dfjs.DataFrame;
promesa = Dataframe.fromCSV(
  "https://raw.githubusercontent.com/plotly/datasets/master/iris.csv"
)
  .then((df) => {
    var df2 = df
      .cast("SepalLength", parseFloat)
      .cast("SepalWidth", parseFloat)
      .cast("PetalLength", parseFloat)
      .cast("PetalWidth", parseFloat)
      .cast("Name", String);

    df4 = df2.map(row => { row.set("Name", capitalizar(row.get("Name")));})

    const mediaSepalLength = df2
      .groupBy("Name")
      .aggregate(
        (group) => (Math.round(group.stat.mean("SepalLength") * 100) / 100)
      )
      .rename("aggregation", "meanSLength");
    const mediaSepalWidth = df2
      .groupBy("Name")
      .aggregate(
        (group) => (Math.round(group.stat.mean("SepalWidth") * 100) / 100)
      )
      .rename("aggregation", "meanSWidth");
    const mediaPetalLength = df2
      .groupBy("Name")
      .aggregate(
        (group) => (Math.round(group.stat.mean("PetalLength")* 100)/ 100)
      )
      .rename("aggregation", "meanPLength");
    const mediaPetalWidth = df2
      .groupBy("Name")
      .aggregate(
        (group) => (Math.round(group.stat.mean("PetalWidth")*100)/ 100)
      )
      .rename("aggregation", "meanPWidth");

    const df3 = mediaSepalLength
      .join(mediaSepalWidth, "Name")
      .join(mediaPetalLength, "Name")
      .join(mediaPetalWidth, "Name");

    var columnas = df3.listColumns();
    var valores = df3.toArray();

    rellenaTabla(columnas, valores);

    const plot_data = (df, col) => {
      div = document.createElement("div");
      div.id = "myDiv";
      var datos = [
        {
            y: df.filter(row => row.get("Name") == "Iris-setosa")
                  .select(col).toArray().flat(),
            type: "box",
            name: "Setosa"
        },
        {
            y: df.filter(row => row.get("Name") == "Iris-versicolor")
                    .select(col).toArray().flat(),
              type: "box",
              name: "Versicolor"
        },
        {
            y: df.filter(row => row.get("Name") == "Iris-virginica")
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

    plot_data(df2, "SepalLength");
    plot_data(df2, "SepalWidth");
    plot_data(df2, "PetalLength");
    plot_data(df2, "PetalWidth");
    
  }).catch((err) => {
    console.log(err);
  });
