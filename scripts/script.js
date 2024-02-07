//Subida de fichero
const fileUpload = document.getElementById("fileUpload");
let uploadedFile = null;
let primeraVez = true;
df = null;
const tabla1 = document.getElementById("tabla1");
const tabla2 = document.getElementById("tabla2");
const grafica1 = document.getElementById("grafica1");
const grafica2 = document.getElementById("grafica2");

fileUpload.addEventListener("dragover", (e) => {
  e.preventDefault();
  fileUpload.classList.add("dragover");
  fileUpload.style.transform = "scale(1.1)";
});

fileUpload.addEventListener("dragleave", (e) => {
  e.preventDefault();
  fileUpload.classList.remove("dragover");
  fileUpload.style.transform = "scale(1)";
});

fileUpload.addEventListener("drop", (e) => {
  e.preventDefault();
  fileUpload.classList.remove("dragover");
  fileUpload.style.transform = "scale(1)";
  // Handle the dropped file here
  const file = e.dataTransfer.files[0];
  uploadedFile = file;
  saveFile();
  console.log("File dropped:", file);
});

fileUpload.addEventListener("click", () => {
  const fileInput = document.createElement("input");
  fileInput.type = "file";
  fileInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    uploadedFile = file;
    saveFile();
    console.log("File selected:", file);
  });
  fileInput.click();
});

function saveFile() {
  const menu = document.getElementById("menu");
  const file_text = document.getElementById("file_text");
  procesarArchivoCSV(uploadedFile);
  if (uploadedFile && primeraVez) {
    const graficasLink = document.createElement("a");
    graficasLink.href = "#";
    graficasLink.onclick = cargaTablas;
    graficasLink.textContent = "Gráficas";
    menu.appendChild(graficasLink);
    const tablasLink = document.createElement("a");
    tablasLink.href = "#";
    tablasLink.onclick = cargaGraficas;
    tablasLink.textContent = "Tablas";
    primeraVez = false;
    file_text.textContent = uploadedFile.name;
    cargaPanelNavegacion();
    menu.appendChild(tablasLink);

    console.log("File saved:", uploadedFile);
  } else {
    console.log("No file uploaded");
  }
}

//Control de páginas
function cargaIntroduccion(){
  document.getElementById("dashboard").style.display = "flex";
  if(!uploadedFile) {
    document.getElementById("about_section").style.display = "flex";
    document.getElementById("graficas").style.display = "none";
    document.getElementById("tablas").style.display = "none";
    document.getElementById("panel_navegacion").style.display = "none";
  }
  else{
    document.getElementById("graficas").style.display = "flex";
    document.getElementById("tablas").style.display = "flex";
    document.getElementById("about_section").style.display = "none";
    document.getElementById("panel_navegacion").style.display = "flex";
  }
}

function cargaAboutMe(){
  document.getElementById("about_section").style.display = "flex";
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("graficas").style.display = "none";
  document.getElementById("tablas").style.display = "none";
  document.getElementById("panel_navegacion").style.display = "none";
}

function cargaGraficas(){
  document.getElementById("graficas").style.display = "flex";
  document.getElementById("tablas").style.display = "none";
  document.getElementById("panel_navegacion").style.display = "none";
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("about_section").style.display = "none";
}

function cargaTablas(){
  document.getElementById("tablas").style.display = "flex";
  document.getElementById("graficas").style.display = "none";
  document.getElementById("panel_navegacion").style.display = "none";
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("about_section").style.display = "none";
}

function cargaPanelNavegacion(){
  document.getElementById("panel_navegacion").style.display = "flex";
  addEventsOnContainer();
  document.getElementById("tablas").style.display = "flex";
  document.getElementById("graficas").style.display = "flex";
}

function addEventsOnContainer(){
    document.getElementById("graficas_panel").addEventListener("click", cargaGraficas);
    document.getElementById("tablas_panel").addEventListener("click", cargaTablas);
    document.getElementById("about_panel").addEventListener("click", cargaAboutMe);
    document.getElementById("exit_panel").addEventListener("click", () => {
        location.href = '../index.html';
    });

    document.getElementById("graficas_panel").addEventListener("mouseover", () => {
        document.getElementById("graficas_panel").style.backgroundColor = "#f1f1f1";
    });
    document.getElementById("graficas_panel").addEventListener("mouseout", () => {
        document.getElementById("graficas_panel").style.backgroundColor = "";
    });

    document.getElementById("tablas_panel").addEventListener("mouseover", () => {
        document.getElementById("tablas_panel").style.backgroundColor = "#f1f1f1";
    });
    document.getElementById("tablas_panel").addEventListener("mouseout", () => {
        document.getElementById("tablas_panel").style.backgroundColor = "";
    });

    document.getElementById("about_panel").addEventListener("mouseover", () => {
        document.getElementById("about_panel").style.backgroundColor = "#f1f1f1";
    });
    document.getElementById("about_panel").addEventListener("mouseout", () => {
        document.getElementById("about_panel").style.backgroundColor = "";
    });

    document.getElementById("exit_panel").addEventListener("mouseover", () => {
        document.getElementById("exit_panel").style.backgroundColor = "#f1f1f1";
    });
    document.getElementById("exit_panel").addEventListener("mouseout", () => {
        document.getElementById("exit_panel").style.backgroundColor = "";
    });
}

//Actualiza año
function mostrarValorRangoTab(){
    var valor = parseInt(document.getElementById("yearSliderTab").value);
    document.getElementById("valorRangoTab").innerHTML = valor;
    preprocessDF(df);
    showTables(df);
}

function mostrarValorRangoGraf(){
    var valor = parseInt(document.getElementById("yearSliderGraf").value);
    document.getElementById("valorRangoGraf").value = valor;
    preprocessDF(df);
    showPlots(df, valor);
}

// Función para procesar el archivo CSV
function procesarArchivoCSV(file) {
    Papa.parse(file, {
        header: true,
        complete: function(results) {
            const dataframe = results.data;
            console.log(dataframe); 
            df = dataframe;
        }
    });
}

function preprocessDF(dataframe) {
    // Convertir cada columna al formato adecuado
    Object.keys(dataframe).forEach((column) => {
        dataframe[column] = Object.values(dataframe[column]).map((value) => {
            if (typeof value === 'number') {
                return parseFloat(value);
            } else if (typeof value === 'string' && !isNaN(Date.parse(value))) {
                return new Date(value);
            } else {
                return value;
            }
        });
    });

    // Rellenar los valores ausentes de cada columna con la media
    Object.keys(dataframe).forEach((column) => {
        const columnValues = dataframe[column];
        const columnMean = columnValues.reduce((sum, value) => sum + value, 0) / columnValues.length;
        dataframe[column] = columnValues.map((value) => {
            return value !== null && value !== undefined && !value.isNaN ? value : columnMean;
        });
    });

    return dataframe;
}

function roundDigitsDF(dataframe) {
    Object.keys(dataframe).forEach((column) => {
        dataframe[column] = Object.values(dataframe[column]).map((value) => {
            return Math.round(value * Math.pow(10, 2)) / Math.pow(10, 2);
        });
    });

    return dataframe;
}

function groupedDF(dataframe) {
    const groupedData = {};
    
    // Agrupar por año y calcular la media en cada columna
    dataframe.forEach((row) => {
        const year = new Date(row.fecha).getFullYear();
        
        if (!groupedData[year]) {
            groupedData[year] = {};
        }
        
        Object.keys(row).forEach((column) => {
            if (column !== 'fecha') {
                if (!groupedData[year][column]) {
                    groupedData[year][column] = [];
                }
                groupedData[year][column].push(row[column]);
            }
        });
    });
    
    // Calcular la media en cada columna
    Object.keys(groupedData).forEach((year) => {
        Object.keys(groupedData[year]).forEach((column) => {
            const values = groupedData[year][column];
            const sum = values.reduce((acc, value) => acc + value, 0);
            const mean = sum / values.length;
            groupedData[year][column] = mean;
        });
    });
    
    return groupedData;
}

function getDateFromDF(dataframe) {
    const dates = dataframe.map((row) => row.fecha);
    return dates;
}

function showPlots(dataframe, year) {
    // Filtrar el dataframe por el año especificado
    const filteredDF = dataframe.filter((row) => new Date(row.fecha).getFullYear() === year);

    // Obtener las fechas en formato Date
    const dates = getDateFromDF(filteredDF);

    // Obtener el dataframe agrupado por año con la media
    const groupedData = groupedDF(filteredDF);

    // Crear los datos para la gráfica de la serie temporal con datos mensuales
    const monthlyData = [];
    Object.keys(filteredDF[0]).forEach((column) => {
        if (column !== 'fecha') {
            const values = filteredDF.map((row) => row[column]);
            monthlyData.push({
                x: dates,
                y: values,
                name: column,
                type: 'scatter',
                mode: 'lines',
            });
        }
    });

    // Crear los datos para la gráfica de la serie temporal con datos agrupados
    const groupedDataArray = Object.entries(groupedData);
    const groupedDataPlot = [];
    groupedDataArray.forEach(([year, data]) => {
        Object.keys(data).forEach((column) => {
            const value = data[column];
            groupedDataPlot.push({
                x: [new Date(year)],
                y: [value],
                name: `${column} (${year})`,
                type: 'scatter',
                mode: 'markers',
            });
        });
    });

    // Configurar el diseño de la gráfica
    const layout = {
        title: 'Gráfica de la serie temporal',
        xaxis: {
            title: 'Fecha',
        },
        yaxis: {
            title: 'Valor',
        },
    };

    // Crear la gráfica utilizando Plotly
    Plotly.newPlot(grafica1, [...monthlyData, ...groupedDataPlot], layout);
}

function showTables(dataframe, year) {
    const filteredDF = dataframe.filter((row) => {
        const date = new Date(getDateFromDF(row));
        return date.getFullYear() === year;
    });

    var roundedDF = roundDigitsDF(filteredDF);

    var groupDF = groupedDF(roundedDF);

    // Convertir el dataframe en una tabla HTML utilizando Plotly
    const tableData = [{
        type: 'table',
        header: {
            values: Object.keys(groupDF[0]),
            align: 'center',
            line: {width: 1, color: 'black'},
            fill: {color: '#506784'},
            font: {family: "Arial", size: 12, color: "white"}
        },
        cells: {
            values: Object.values(groupDF),
            align: 'center',
            line: {color: "black", width: 1},
            fill: {color: ['#F5F8FF', 'white']},
            font: {family: "Arial", size: 11, color: ["black"]}
        }
    }];

    // Configurar el diseño de la tabla
    const tableLayout = {
        title: `Tabla del año ${year}`,
        autosize: true,
        margin: {
            l: 50,
            r: 50,
            b: 50,
            t: 50,
            pad: 4
        },
        paper_bgcolor: '#F5F8FF',
        plot_bgcolor: '#F5F8FF',
        font: {
            family: "Arial",
            size: 12,
            color: "#506784"
        }
    };

    // Renderizar la tabla utilizando Plotly y añadirla al div con id "tabla1"
    Plotly.newPlot(tabla1, tableData, tableLayout);
}


