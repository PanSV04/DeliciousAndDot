<?php
class DB
{
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "candy_shop");
    }

    public function get_products($taste, $stuffing, $category, $stock, $portion, $min_price, $max_price, $sale, $user_id)
    {
        $sql = "SELECT products.*, 
        IFNULL(loving.id, -1) AS is_loving,
        weight_value.name AS weight_name, 
        taste.name AS taste_name, 
        stuffing.name AS stuffing_name,
        categories.name AS category_name
        FROM products 
        LEFT JOIN (SELECT * FROM love WHERE user = $user_id) AS loving ON products.id = loving.product
        INNER JOIN weight_value ON products.weight_value = weight_value.id 
        INNER JOIN taste ON products.taste = taste.id 
        INNER JOIN stuffing ON products.stuffing = stuffing.id  
        INNER JOIN categories ON products.category = categories.id";

        $addict_string = 'WHERE';

        if (!is_null($taste)) {
            $array = implode(',', $taste);
            $sql .= " $addict_string taste IN ($array)";
            $addict_string = "AND";
        }

        if (!is_null($stuffing)) {
            $array = implode(',', $stuffing);
            $sql .= " $addict_string stuffing IN ($array)";
            $addict_string = "AND";
        }

        if (!is_null($portion)) {
            $array = implode(',', $portion);
            $sql .= " $addict_string portion IN ($array)";
            $addict_string = "AND";
        }

        if (!is_null($category)) {
            $sql .= " $addict_string category = $category";
            $addict_string = "AND";
        }

        if (!is_null($stock)) {
            $sql .= " $addict_string stock = $stock";
            $addict_string = "AND";
        }

        if (!is_null($sale)) {
            $sql .= " $addict_string sale > 0";
            $addict_string = "AND";
        }

        if (!is_null($min_price)) {
            $sql .= " $addict_string ((price >= $min_price AND sale = 0) OR sale >= $min_price)";
            $addict_string = "AND";
        }

        if (!is_null($max_price)) {
            $sql .= " $addict_string ((price <= $max_price AND sale = 0) OR sale <= $max_price)";
            $addict_string = "AND";
        }

        error_log($sql);

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function update__product($id)
    {
        $sql = "SELECT products.*, 
        weight_value.name AS weight_name, 
        taste.name AS taste_name, 
        stuffing.name AS stuffing_name,
        categories.name AS category_name
        FROM products 
        INNER JOIN weight_value ON products.weight_value = weight_value.id 
        INNER JOIN taste ON products.taste = taste.id 
        INNER JOIN stuffing ON products.stuffing = stuffing.id 
        INNER JOIN categories ON products.category = categories.id
        WHERE products.id = $id";

        $result = mysqli_query($this->conn, $sql);

        error_log($sql);
        error_log("fuhdufh");

        return mysqli_fetch_assoc($result);
    }

    public function get_one_prod($id)
    {
        $sql = "SELECT products.*, 
        weight_value.name AS weight_name, 
        taste.name AS taste_name, 
        stuffing.name AS stuffing_name,
        categories.name AS category_name
        FROM products 
        INNER JOIN weight_value ON products.weight_value = weight_value.id 
        INNER JOIN taste ON products.taste = taste.id 
        INNER JOIN stuffing ON products.stuffing = stuffing.id 
        INNER JOIN categories ON products.category = categories.id
        WHERE products.id = $id";

        $result = mysqli_query($this->conn, $sql);

        error_log($sql);
        error_log("fuhdufh");

        return mysqli_fetch_assoc($result);
    }

    public function add_products($title, $image, $price, $sale, $weight, $description, $portion, $stuffing, $taste, $stock, $category, $weight_value)
    {
        $sql = "INSERT INTO products(title, image, price, sale, weight, description, portion, stuffing, taste, stock, category, weight_value) 
        VALUES ('$title', '$image', '$price', '$sale', '$weight', '$description', '$portion', '$stuffing', '$taste', '$stock', '$category', '$weight_value')";

        $result = mysqli_query($this->conn, $sql);

        error_log($sql);
        return $result;
    }

    public function get_taste()
    {
        $sql = "SELECT * FROM taste";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function get_stuffing()
    {
        $sql = "SELECT * FROM stuffing";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function get_categories()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function get_stock()
    {
        $sql = "SELECT * FROM stock";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function get_weight()
    {
        $sql = "SELECT * FROM taste";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }


    public function get_users()
    {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function add_users($name, $surname, $patronymic, $date_birth, $login, $password, $city, $street, $num_home, $num_app)
    {
        $sql = "INSERT INTO users(name, surname, patronymic, date_birth, password, login, city, street, num_home, num_app) 
        VALUES ('$name', '$surname', '$patronymic', '$date_birth', '$password', '$login', '$city', '$street', '$num_home', '$num_app')";

        $result = mysqli_query($this->conn, $sql);

        return $result;
    }


    public function get_user_login($login)
    {
        $sql = "SELECT * FROM users WHERE login = '$login'";

        $result = mysqli_query($this->conn, $sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }

    public function get_love($user_id)
    {
        $sql = "SELECT products.*, 
        weight_value.name AS weight_name, 
        taste.name AS taste_name, 
        stuffing.name AS stuffing_name,
        categories.name AS category_name
        FROM products
        INNER JOIN weight_value ON products.weight_value = weight_value.id 
        INNER JOIN taste ON products.taste = taste.id 
        INNER JOIN stuffing ON products.stuffing = stuffing.id 
        INNER JOIN categories ON products.category = categories.id
        WHERE products.id IN (SELECT product FROM love WHERE user = $user_id)";

        $result = mysqli_query($this->conn, $sql);

        error_log($sql);

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function add_love($user, $product)
    {
        $sql = "INSERT INTO love(user, product) VALUE ($user, $product)";

        $result = mysqli_query($this->conn, $sql);

        return $result;
    }

    public function del_love($user, $product)
    {
        $sql = "DELETE FROM love WHERE user = $user AND product = $product";

        $result = mysqli_query($this->conn, $sql);

        return $result;
    }

    public function add_cart($user, $product, $quantity)
    {
        $sql = "INSERT INTO cart(user, product, quantity) VALUE ($user, $product, $quantity)";

        $result = mysqli_query($this->conn, $sql);

        return $result;
    }

    public function get_cart($user_id)
    {
        $sql = "SELECT cart.id AS id,
        products.*,
        weight_value.name AS weight_name, 
        cart.quantity AS quantity
        FROM cart
        INNER JOIN products ON products.id =  cart.product 
        INNER JOIN weight_value ON products.weight_value = weight_value.id 
        WHERE cart.user = $user_id";

        $result = mysqli_query($this->conn, $sql);

        if ($result !== false) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function is_cart_exists($user, $product)
    {
        $sql = "SELECT COUNT(*) FROM cart WHERE user = $user AND product = $product";

        $result = mysqli_query($this->conn, $sql);

        return $result > 0;
    }

    public function del_cart($user, $product)
    {
        $sql = "DELETE FROM cart WHERE user = $user AND product = $product";

        $result = mysqli_query($this->conn, $sql);

        return $result;
    }
}
