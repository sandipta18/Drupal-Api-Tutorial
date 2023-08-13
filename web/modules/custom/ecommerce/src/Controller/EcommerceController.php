<?php

namespace Drupal\ecommerce\Controller;

use Drupal;
use Drupal\file\Entity\File;
use Drupal\node\Entity\Node;
use GuzzleHttp\ClientInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for ecommerce routes.
 */
class EcommerceController extends ControllerBase {

  /**
   * Client Interface Handler.
   *
   * @var GuzzleHttp\ClientInterface
   */
  protected $http_client;

  /**
   * Constructs ClientInterface instance.
   *
   * @param ClientInterface $http_client
   *   Client Interface Handler.
   */
  public function __construct(ClientInterface $http_client) {
    $this->http_client = $http_client;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('http_client'),
    );
  }

  /**
   * Builds the response.
   */
  public function build() {
    $url = 'https://fakestoreapi.com/products';
    $response = $this->http_client->get($url);
    $data = json_decode($response->getBody(), TRUE);
    // Create nodes of the desired content type with the fetched data.
    $this->createNodes($data);
    $output['products_list'] = [
      '#theme' => 'products_list',
      '#products' => $data,
    ];
    return $output;
  }

  /**
   * This function is responsible for associating the values fetched from the
   * api with content type product.
   *
   * @param array $data
   *   Holds the content to be associated with a content type.
   *
   * @return void
   */
  private function createNodes(array $data) {
    $entity_manager = $this->entityTypeManager();
    $file_system = \Drupal::service('file_system');
    foreach($data as $item) {
      $hash = $this->generateHash($item['id']);
      $existing_node = $this->getExistingNodeByCustomHash($hash);
      $image_url = $item['image'];
      $image_data = file_get_contents($image_url);
      $file_extension = pathinfo(parse_url($image_url, PHP_URL_PATH), PATHINFO_EXTENSION);
      $destination = 'public://product_images';
      $filename = uniqid('image_', true) . '.' . $file_extension;
      $file_path = $file_system->realpath($destination) .'/'. $filename;
      file_put_contents($file_path, $image_data);
      $file = File::create([
        'uri' => $destination . '/' . $filename,
      ]);
      $file->save();
      if(!$existing_node) {
      $node = $entity_manager->getStorage('node')->create([
        'type' => 'products',
        'title' => $item['title'],
        'field_price' => $item['price'],
        'field_description' => $item['description'],
          // 'field_image' => $item['image'],
        'field_image' => [
          'target_id' => $file->id(),
        ],
        'field_category' => $item['category'],
        'field_rating' => $item['rating']['rate'],
        'field_product_id' => $hash,
      ]);
      $node->save();
    }
    }
  }

  /**
   * This function is reponsible for generating a hash value that will behave
   * as an unique identifier.
   *
   * @param mixed $id
   *   ID of the item.
   *
   * @return string
   *   Returns the hash value that will behave as the unique identifier,
   */
  private function generateHash(mixed $id) {
    return sha1($id);
  }

  /**
   * @param mixed $hash
   *   Contains the unique identifying hash value.
   *
   * @return void
   */
  private function getExistingNodeByCustomHash($hash) {
    // Get the entity storage for nodes.
    $node_storage = $this->entityTypeManager()->getStorage('node');
    $query = $node_storage->getQuery()
      ->condition('type', 'products')
      ->condition('field_product_id', $hash); // Replace 'field_custom_hash' with the actual field name that stores the custom hash.
    $query->accessCheck(FALSE);
    $nids = $query->execute();

    if (!empty($nids)) {
      // Load and return the first existing node with the given custom hash.
      return Node::load(reset($nids));
    }

    return NULL;
  }


}
