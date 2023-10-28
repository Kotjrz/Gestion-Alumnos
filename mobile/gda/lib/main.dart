import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(MyApp());
}

class MyApp extends StatefulWidget {
  @override
  _MyAppState createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  String nombreApellido = "";
  List<String> cursos = [];
  TextEditingController dniController = TextEditingController();

  Future<void> fetchData(String dni) async {
    final response = await http.get(
        Uri.parse('http://10.0.2.32/Gestion-Alumnos/assets/api/cursos.php?dni='+dni)); // Cambia la URL a tu API

    if (response.statusCode == 200) {
      final data = json.decode(response.body);
      setState(() {
        cursos = List<String>.from(data.map((curso) =>
            '${curso['Nombre_Curso']} - ${curso['Anio']}'));
      });
    } else {
      print('Error al obtener datos del alumno: ${response.statusCode}');
    }
  }

  void onPressedButton() {
    String dni = dniController.text;
    if (dni.isNotEmpty) {
      fetchData(dni);
    }
  }

  void onCourseSelected(String course) {
    print('Curso seleccionado: $course');
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.black,
          title: Row(
            children: [
              Text('Curso'),
              SizedBox(width: 10),
              PopupMenuButton<String>(
                onSelected: onCourseSelected,
                itemBuilder: (BuildContext context) {
                  return cursos.map((course) {
                    return PopupMenuItem<String>(
                      value: course,
                      child: Text(course),
                    );
                  }).toList();
                },
              ),
              SizedBox(width: 20),
              Text(nombreApellido),
            ],
          ),
        ),
        body: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Container(
                height: 50,
                width: double.infinity,
                color: Colors.blue,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Text(
                      'Contenido del cuadro superior',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 18.0,
                      ),
                    ),
                  ],
                ),
              ),
              SizedBox(height: 20),
              Container(

                width: 160,
                height: 195,
                color: Colors.grey,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Text(
                      'Ingresar DNI del Alumno',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 18.0,
                      ),
                    ),
                    SizedBox(height: 10),
                    TextField(
                      controller: dniController,
                      keyboardType: TextInputType.number,
                      decoration: InputDecoration(
                        hintText: 'Ingrese el DNI',
                      ),
                    ),
                    SizedBox(height: 10),
                    ElevatedButton(
                      onPressed: onPressedButton,
                      child: Text('Obtener Nombre y Cursos con Ciclos Lectivos'),
                    ),
                    SizedBox(height: 20),
                    Text(nombreApellido),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}