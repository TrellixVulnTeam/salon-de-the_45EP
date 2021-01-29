<?php 

/**
 * Crée l'objet PDO à partir des paramètres de connexion à la base de données
 */
function getPDOConnection(): PDO 
{
    $dsn = 'mysql:host=' . BDD_HOST . ';dbname=' . BDD_NAME . ';charset=utf8';

    ///////////////////////////////////////////////////////
    // Créer une connexion à la base de données avec PDO
    // PDO est une classe PHP qu'on va instancier (créer un objet PDO)
    $pdo = new PDO(
        $dsn, // (string) DSN (Data Source Name)
        BDD_USER, // Utilisateur
        BDD_PASSWORD, // Mot de passe
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    return $pdo;
}


/**
 * Prépare et exécute une requête SQL
 */
function executeQuery(string $sql, array $values = []): PDOStatement
{
    // Création de l'objet PDO
    $pdo = getPDOConnection();    

    // On commence par préparer la requête SQL
    $query = $pdo->prepare($sql);

    // Exécution de la requête
    $query->execute($values);

    // On retourne l'objet requête (de la classe PDOStatement)
    return $query;
}

/**
 * Exécute une requête de sélection et retourne PLUSIEURS résultats
 */
function fetchAllRows(string $sql, array $values = []): array
{
    // On exécute la requête
    $query = executeQuery($sql, $values);

    // On retourne tous les résultats
    return $query->fetchAll();
}

/**
 * Exécute une requête de sélection et retourne UN résultat
 */
function fetchOneRow(string $sql, array $values = []): array
{
    // On exécute la requête
    $query = executeQuery($sql, $values);

    // On retourne tous les résultats
    return $query->fetch();
}

/**
 * Exécute une requête SQL d'insertion et retourne l'id de l'enregistrement créé
 */
function insertQuery(string $sql, array $values = []): ?int
{
    // Création de l'objet PDO
    $pdo = getPDOConnection();    

    // On commence par préparer la requête SQL
    $query = $pdo->prepare($sql);

    // Exécution de la requête
    $query->execute($values);

    // On retourne l'id de l'enregistrement créé
    return $pdo->lastInsertId();
}