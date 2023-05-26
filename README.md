## Pre-requisitos

- MySQL 5.7 o superior
- PHP 8.0 o superior
- Composer
- Nodejs v18 o superior

## Instalación

- Instalación de dependencias Servidor
```
composer install
```  

- Instalación de dependencias Cliente (Opcional)

```
npm install && npm run dev
```  

- Ejecución  

```
php artisan serve
```  

1. Crear compañía  

**Metodo:** POST 
**Endpoint:** /api/companies 
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

**Request Body:**  

```
{
    "name": "Frutiverduras La Hacienda",
    "address": "Cra. 25 # 32 - 26, Girardota",
    "zip_code": "051030"
}
```  

**Response Body:**  

```
{
    "message": "The company has been created.",
    "company": {
        "name": "Frutiverduras La Hacienda",
        "address": "Cra. 25 # 32 - 26, Girardota",
        "zip_code": "051030",
        "updated_at": "2023-05-26T19:21:55.000000Z",
        "created_at": "2023-05-26T19:21:55.000000Z",
        "id": 4
    }
}
```

2. Modificar compañía

**Metodo:** PUT
**Endpoint:** /api/companies/{id}
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |


**Request Body:**  

```
{
    "name": "Frutiverduras La Hacienda",
    "address": "Cra. 60 # 25 - 33, Bogotá",
    "zip_code": "051030"
}
```  

**Response Body:**  

```
{
    "message": "The company has been modified.",
    "company": {
        "id": 4,
        "name": "Frutiverduras La Hacienda",
        "address": "Cra. 60 # 25 - 33, Bogotá",
        "zip_code": "051030",
        "positions_available": 0,
        "created_at": "2023-05-26T19:21:55.000000Z",
        "updated_at": "2023-05-26T19:25:00.000000Z"
    }
}
```  

3. Eliminar compañía

**Metodo:** DELETE
**Endpoint:** /api/companies/{id}
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

```  

**Response Body:**  

```

{
    "message": "The company has been deleted."
}

4. Mostrar compañías

**Metodo:** GET
**Endpoint:** /api/companies
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

```  

**Response Body:**  

```

{
     {
        "id": 1,
        "name": "La huerta",
        "address": "Cra 23a # 34 - 15",
        "zip_code": "133475689",
        "positions_available": -3,
        "created_at": "2023-05-24T19:44:47.000000Z",
        "updated_at": "2023-05-26T18:45:40.000000Z"
    },
    {
        "id": 3,
        "name": "Finca La Tesorería",
        "address": "Calle 33 # 21 -55",
        "zip_code": "122222222",
        "positions_available": -1,
        "created_at": "2023-05-25T22:31:25.000000Z",
        "updated_at": "2023-05-26T17:59:47.000000Z"
    }
 }
 
 5. Crear persona  

**Metodo:** POST 
**Endpoint:** /api/people
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

**Request Body:**  

```
{
    "name": "José Fernandez Alvarado",
    "birth_date": "1998/07/12",
    "education_level": "High School",
    "client_recorded_date": "2023/03/21"
}
```  

**Response Body:**  

```
{
    "message": "The person has been created.",
    "person": {
        "name": "José Fernandez Alvarado",
        "birth_date": "1998/07/12",
        "education_level": "High School",
        "client_recorded_date": "2023/03/21",
        "updated_at": "2023-05-26T19:46:19.000000Z",
        "created_at": "2023-05-26T19:46:19.000000Z",
        "id": 5
    }
}
```

6. Modificar persona 

**Metodo:** PUT
**Endpoint:** /api/people/{id}
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |


**Request Body:**  

```
{
    "name": "José Fernandez Alvarado",
    "birth_date": "1998/07/12",
    "education_level": "Elementary School",
    "client_recorded_date": "2023/03/21"
}
```  

**Response Body:**  

```
{
    "message": "The person has been modified.",
    "person": {
        "id": 5,
        "name": "José Fernandez Alvarado",
        "birth_date": "1998/07/12",
        "education_level": "Elementary School",
        "client_recorded_date": "2023/03/21",
        "created_at": "2023-05-26T19:46:19.000000Z",
        "updated_at": "2023-05-26T19:48:57.000000Z"
    }
}
```  

7. Eliminar persona

**Metodo:** DELETE
**Endpoint:** /api/people/{id}
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

```  

**Response Body:**  

```

{
    "message": "The person has been deleted."
}

8. Mostrar personas

**Metodo:** GET
**Endpoint:** /api/people
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

```  

**Response Body:**  

```

{
    {
        "id": 1,
        "name": "Jose Alvarez",
        "birth_date": "1995-08-14",
        "education_level": "High school",
        "client_recorded_date": "2023-02-13",
        "created_at": "2023-05-24T20:16:26.000000Z",
        "updated_at": "2023-05-24T20:16:26.000000Z"
    },
    {
        "id": 2,
        "name": "Andrés Darío Rentería Moreno",
        "birth_date": "1993-10-14",
        "education_level": "University",
        "client_recorded_date": "2023-01-21",
        "created_at": "2023-05-24T20:17:08.000000Z",
        "updated_at": "2023-05-24T20:19:25.000000Z"
    },
    {
        "id": 4,
        "name": "Luis Ignacio Da Silva",
        "birth_date": "1982-05-28",
        "education_level": "High School",
        "client_recorded_date": "2023-01-01",
        "created_at": "2023-05-25T22:53:18.000000Z",
        "updated_at": "2023-05-25T22:53:18.000000Z"
    }
 }

9. Crear cargo  

**Metodo:** POST 
**Endpoint:** /api/positions
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

**Request Body:**  

```
{
    "role": "Human resource manager",
    "experience_required": 5,
    "salary": "5000",
    "company_id": 3
}
```  

**Response Body:**  

```
{
    "message": "The position has been created.",
    "position": {
        "role": "Human resource manager",
        "experience_required": 5,
        "salary": "5000",
        "company_id": 3,
        "updated_at": "2023-05-26T19:59:35.000000Z",
        "created_at": "2023-05-26T19:59:35.000000Z",
        "id": 11
    }
}
```

10. Modificar cargo

**Metodo:** PUT
**Endpoint:** /api/positions/{id}
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |


**Request Body:**  

```
{
    "role": "Human resource manager",
    "experience_required": 8,
    "salary": "5200",
    "company_id": 3
}
```  

**Response Body:**  

```
{
    "message": "The position has been modified.",
    "position": {
        "id": 11,
        "role": "Human resource manager",
        "experience_required": 8,
        "salary": "5200",
        "company_id": 3,
        "person_id": null,
        "available": 1,
        "created_at": "2023-05-26T19:59:35.000000Z",
        "updated_at": "2023-05-26T20:00:39.000000Z"
    }
}
```  

11. Eliminar cargo

**Metodo:** DELETE
**Endpoint:** /api/positions/{id}
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

```  

**Response Body:**  

```

{
    "message": "The position has been deleted."
}

12. Mostrar cargos

**Metodo:** GET
**Endpoint:** /api/positions
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

```  

**Response Body:**  

```

{
     {
        "id": 2,
        "role": "Accountance",
        "experience_required": 3,
        "salary": 2000,
        "company_id": 1,
        "person_id": null,
        "available": 0,
        "created_at": "2023-05-26T13:58:02.000000Z",
        "updated_at": "2023-05-26T13:58:02.000000Z",
        "company": {
            "id": 1,
            "name": "La huerta",
            "address": "Cra 23a # 34 - 15",
            "zip_code": "133475689",
            "positions_available": -3,
            "created_at": "2023-05-24T19:44:47.000000Z",
            "updated_at": "2023-05-26T18:45:40.000000Z"
        },
        "person": null
    },
    {
        "id": 3,
        "role": "Accountance",
        "experience_required": 3,
        "salary": 2000,
        "company_id": 1,
        "person_id": 1,
        "available": 0,
        "created_at": "2023-05-26T13:58:04.000000Z",
        "updated_at": "2023-05-26T16:56:51.000000Z",
        "company": {
            "id": 1,
            "name": "La huerta",
            "address": "Cra 23a # 34 - 15",
            "zip_code": "133475689",
            "positions_available": -3,
            "created_at": "2023-05-24T19:44:47.000000Z",
            "updated_at": "2023-05-26T18:45:40.000000Z"
        },
        "person": {
            "id": 1,
            "name": "Jose Alvarez",
            "birth_date": "1995-08-14",
            "education_level": "High school",
            "client_recorded_date": "2023-02-13",
            "created_at": "2023-05-24T20:16:26.000000Z",
            "updated_at": "2023-05-24T20:16:26.000000Z"
        }
    },
    {
        "id": 4,
        "role": "Manager",
        "experience_required": 5,
        "salary": 3000,
        "company_id": 3,
        "person_id": 2,
        "available": 0,
        "created_at": "2023-05-26T16:58:32.000000Z",
        "updated_at": "2023-05-26T16:59:25.000000Z",
        "company": {
            "id": 3,
            "name": "Finca La Tesorería",
            "address": "Calle 33 # 21 -55",
            "zip_code": "122222222",
            "positions_available": -1,
            "created_at": "2023-05-25T22:31:25.000000Z",
            "updated_at": "2023-05-26T20:01:24.000000Z"
        },
        "person": {
            "id": 2,
            "name": "Andrés Darío Rentería Moreno",
            "birth_date": "1993-10-14",
            "education_level": "University",
            "client_recorded_date": "2023-01-21",
            "created_at": "2023-05-24T20:17:08.000000Z",
            "updated_at": "2023-05-24T20:19:25.000000Z"
        }
    }
 }
 
 13. Mostrar cargos disponibles

**Metodo:** GET
**Endpoint:** /api/available-positions
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

```  

**Response Body:**  

```

{
     {
        "id": 6,
        "role": "Executive manager",
        "experience_required": 10,
        "salary": 20000,
        "company_id": 3,
        "person_id": null,
        "available": 1,
        "created_at": "2023-05-26T17:09:50.000000Z",
        "updated_at": "2023-05-26T17:09:50.000000Z",
        "company": {
            "id": 3,
            "name": "Finca La Tesorería",
            "address": "Calle 33 # 21 -55",
            "zip_code": "122222222",
            "positions_available": -1,
            "created_at": "2023-05-25T22:31:25.000000Z",
            "updated_at": "2023-05-26T20:01:24.000000Z"
        }
    },
    {
        "id": 7,
        "role": "Secretary",
        "experience_required": 3,
        "salary": 1000,
        "company_id": 3,
        "person_id": 2,
        "available": 1,
        "created_at": "2023-05-26T17:10:13.000000Z",
        "updated_at": "2023-05-26T17:59:16.000000Z",
        "company": {
            "id": 3,
            "name": "Finca La Tesorería",
            "address": "Calle 33 # 21 -55",
            "zip_code": "122222222",
            "positions_available": -1,
            "created_at": "2023-05-25T22:31:25.000000Z",
            "updated_at": "2023-05-26T20:01:24.000000Z"
        }
    },
    {
        "id": 10,
        "role": "Farmer",
        "experience_required": 2,
        "salary": 1500,
        "company_id": 3,
        "person_id": 1,
        "available": 1,
        "created_at": "2023-05-26T17:12:08.000000Z",
        "updated_at": "2023-05-26T17:59:47.000000Z",
        "company": {
            "id": 3,
            "name": "Finca La Tesorería",
            "address": "Calle 33 # 21 -55",
            "zip_code": "122222222",
            "positions_available": -1,
            "created_at": "2023-05-25T22:31:25.000000Z",
            "updated_at": "2023-05-26T20:01:24.000000Z"
        }
    }
 }
 
 14. Mostrar cargos disponibles

**Metodo:** GET
**Endpoint:** /api/available-positions?role={role}
**Headers:**  

| Key | Value |
| --- | --- |
| Content-Type | application/json |

```  

**Response Body:**  

```

{
    {
        "id": 7,
        "role": "Secretary",
        "experience_required": 3,
        "salary": 1000,
        "company_id": 3,
        "person_id": 2,
        "available": 1,
        "created_at": "2023-05-26T17:10:13.000000Z",
        "updated_at": "2023-05-26T17:59:16.000000Z",
        "company": {
            "id": 3,
            "name": "Finca La Tesorería",
            "address": "Calle 33 # 21 -55",
            "zip_code": "122222222",
            "positions_available": -1,
            "created_at": "2023-05-25T22:31:25.000000Z",
            "updated_at": "2023-05-26T20:01:24.000000Z"
        }
    }
 }
