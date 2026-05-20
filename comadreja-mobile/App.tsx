import { useEffect, useState } from 'react';
import {
  View,
  Text,
  ScrollView,
  Image,
  ActivityIndicator
} from 'react-native';

export default function App() {

  const [products, setProducts] = useState<any[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {

    fetch('https://comadrejashop-main-nzmf9r.laravel.cloud/api/products')
      .then(async response => {

        const text = await response.text();

        console.log(text);

        return JSON.parse(text);

      })
      .then(data => {
        setProducts(data);
        setLoading(false);
      })
      .catch(error => {
        console.log(error);
      });

  }, []);

  if (loading) {
    return (
      <View
        style={{
          flex: 1,
          justifyContent: 'center',
          alignItems: 'center'
        }}
      >
        <ActivityIndicator size="large" />
      </View>
    );
  }

  return (

    <ScrollView
      style={{
        flex: 1,
        padding: 20,
        marginTop: 50
      }}
    >

      <Text
        style={{
          fontSize: 30,
          fontWeight: 'bold',
          marginBottom: 20
        }}
      >
        Comadreja Shop
      </Text>

      {products.map((product) => (

        <View
          key={product.id}
          style={{
            borderWidth: 1,
            borderColor: '#ddd',
            borderRadius: 12,
            padding: 15,
            marginBottom: 20
          }}
        >

          <Image
            source={{ uri: product.image_url }}
            style={{
              width: '100%',
              height: 200,
              borderRadius: 10,
              marginBottom: 10
            }}
          />

          <Text
            style={{
              fontSize: 20,
              fontWeight: 'bold'
            }}
          >
            {product.name}
          </Text>

          <Text
            style={{
              marginTop: 5,
              color: '#555'
            }}
          >
            {product.description}
          </Text>

          <Text
            style={{
              marginTop: 10,
              fontSize: 18,
              fontWeight: 'bold'
            }}
          >
            ${product.price}
          </Text>

          <Text>
            Stock: {product.stock}
          </Text>

          <Text>
            Categoría: {product.category.name}
          </Text>

        </View>

      ))}

    </ScrollView>

  );
}