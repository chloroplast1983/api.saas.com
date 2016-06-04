<?php
namespace Web\Controller;

use System\Classes\Controller;
use Core;
use Tobscure\JsonApi\Document;
use Tobscure\JsonApi\Collection;
use Tobscure\JsonApi\Parameters;
use Tobscure\JsonApi\Resource;

/**
 * 配送地址应用层服务
 * @author chloroplast
 * @version 1.0.20160222
 */
class DeliveredInformationController extends Controller
{

    /**
     * 对应路由 /deliveredInformations[/{ids}]
     * GET方法传参
     * 根据用户id获取配送信息,该接口用于:
     * 1. 根据id获取配送信息地址
     *
     * 示例: /deliveredInformations?filter[userId]=xxx 获取id(用户id)为xxx的配送信息
     *      /deliveredInformations/1,2,3 获取id(用户id)为1,2,3的配送信息
     *
     * @param string $ids 配送信息id列表
     * @return jsonApi
     */
    public function get(string $ids = '')
    {

        $filter = $this->getRequest()->get('filter');

        $uid = isset($filter['userId']) ? $filter['userId'] : 0;

        $deliveredInformations = array();

        if (!empty($ids)) {
            $ids = explode(',', $ids);
            foreach ($ids as $id) {
                $deliveredInformation = new \Web\Model\DeliveredInformation();
                $deliveredInformation->setId($id);
                $guest = new \Web\Model\Guest();
                $guest->setId($id);
                $deliveredInformation->setGuest($guest);
                $deliveredInformation->setConsignee('consignee');
                $deliveredInformation->setConsigneeAddress('consigneeAddress');
                $area = new \Area\Model\Area();
                $area->setId($id);
                $area->setName('province');
                $deliveredInformation->setProvince($area);
                $area = new \Area\Model\Area();
                $area->setId($id);
                $area->setName('city');
                $deliveredInformation->setCity($area);
                $area = new \Area\Model\Area();
                $area->setId($id);
                $area->setName('district');
                $deliveredInformation->setDistrict($area);
                $deliveredInformation->setConsigneePhone('111');
                $deliveredInformation->setConsigneePostalCode('xxx');
                $deliveredInformations[] = $deliveredInformation;
            }
        } elseif (!empty($uid)) {
            $counts = array(1,2,3);
            foreach ($counts as $count) {
                $deliveredInformation = new \Web\Model\DeliveredInformation();
                $deliveredInformation->setId($count);
                $guest = new \Web\Model\Guest();
                $guest->setId($uid);
                $deliveredInformation->setGuest($guest);
                $deliveredInformation->setConsignee('consignee');
                $deliveredInformation->setConsigneeAddress('consigneeAddress');
                $area = new \Area\Model\Area();
                $area->setId(1);
                $area->setName('province');
                $deliveredInformation->setProvince($area);
                $area = new \Area\Model\Area();
                $area->setId(2);
                $area->setName('city');
                $deliveredInformation->setCity($area);
                $area = new \Area\Model\Area();
                $area->setId(3);
                $area->setName('district');
                $deliveredInformation->setDistrict($area);
                $deliveredInformation->setConsigneePhone('111');
                $deliveredInformation->setConsigneePostalCode('xxx');
                $deliveredInformations[] = $deliveredInformation;
            }
        }

        $collection = new Collection($deliveredInformations, new \Web\View\DeliveredInformationSerializer);
        $collection->with(['areas','guest']);
        $document = new Document($collection);
        $document->addLink('self', 'http://api.51chengxinyou.com/deliveredInformations');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /deliveredInformations/{id:\d+}
     * PUT方法传参
     * 根据配送信息id,修改配送信息
     * 1. 修改配送信息
     * 2. 更新updateTime
     *
     * 示例: /deliveredInformations/1 更新配送信息1
     *
     * @param int $id 配送信息id
     * @param jsonApi array("data"=>array("type"=>"deliveredInformation",
     *                                    "attributes"=>array(
     *                                                      "consignee"=>"收货人",
     *                                                      "consigneeAddress"=>"收货地址",
     *                                                      "consigneePhone"=>"收货人联系电话",
     *                                                      "consigneePostalCode"=>"收货人地址邮政编码"),
     *                                    "relationships"=>array(
     *                                                        "province"=>array("type"=>"area",
     *                                                              "id"=>"省id"),
     *                                                         "city"=>array("type"=>"area",
     *                                                              "id"=>"市id"),
     *                                                         "district"=>array("type"=>"area",
     *                                                              "id"=>"区id")
     *                                                          )
     *                                  )
     * @return jsonApi
     */
    public function edit($id)
    {
        $data = $this->getRequest()->put("data");
        $relationships = $data['relationships'];

        $deliveredInformation = new \Web\Model\DeliveredInformation();
        $deliveredInformation->setId($id);
        $guest = new \Web\Model\Guest();
        $guest->setId(1);
        $deliveredInformation->setGuest($guest);
        $deliveredInformation->setConsignee($data['attributes']['consignee']);
        $deliveredInformation->setConsigneeAddress($data['attributes']['consigneeAddress']);
        $area = new \Area\Model\Area();
        $area->setId($relationships['areas'][0]['id']);
        $area->setName('province');
        $deliveredInformation->setProvince($area);
        $area = new \Area\Model\Area();
        $area->setId($relationships['areas'][1]['id']);
        $area->setName('city');
        $deliveredInformation->setCity($area);
        $area = new \Area\Model\Area();
        $area->setId($relationships['areas'][2]['id']);
        $area->setName('district');
        $deliveredInformation->setDistrict($area);
        $deliveredInformation->setConsigneePhone($data['attributes']['consigneePhone']);
        $deliveredInformation->setConsigneePostalCode($data['attributes']['consigneePostalCode']);

        $resource = new Resource($deliveredInformation, new \Web\View\DeliveredInformationSerializer);
        $resource->with(['areas']);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/deliveredInformations/'.$id);
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /deliveredInformations
     * POST方法传参
     * 添加配送信息
     *
     * 示例: /deliveredInformations 添加配送信息
     *
     * @param jsonApi array("data"=>array(
     *                                    "type"=>"deliveredInformation",
     *                                    "attributes"=>array(
     *                                                      "consignee"=>"收货人",
     *                                                      "consigneeAddress"=>"收货地址",
     *                                                      "consigneePhone"=>"收货人联系电话",
     *                                                      "consigneePostalCode"=>"收货人地址邮政编码"),
     *                                    "relationships"=>array(
     *                                                      "guest"=>array(
     *                                                          "type"=>"guest",
     *                                                          "id"=>"顾客id"
     *                                                          )
     *                                                       "province"=>array("type"=>"area",
     *                                                              "id"=>"省id"),
     *                                                       "city"=>array("type"=>"area",
     *                                                              "id"=>"市id"),
     *                                                       "district"=>array("type"=>"area",
     *                                                              "id"=>"区id")
     *                                                      )
     *                                  )
     * @return jsonApi
     */
    public function add()
    {
        $this->getResponse()->setStatusCode(201);
        $data = $this->getRequest()->post("data");
        $relationships = $data['relationships'];

        $deliveredInformation = new \Web\Model\DeliveredInformation();
        $deliveredInformation->setId(33);
        $guest = new \Web\Model\Guest();

        $guest->setId($relationships['guest']['id']);
        $deliveredInformation->setGuest($guest);
        $deliveredInformation->setConsignee($data['attributes']['consignee']);
        $deliveredInformation->setConsigneeAddress($data['attributes']['consigneeAddress']);
        $area = new \Area\Model\Area();
        $area->setId($relationships['areas'][0]['id']);
        $area->setName('province');
        $deliveredInformation->setProvince($area);
        $area = new \Area\Model\Area();
        $area->setId($relationships['areas'][1]['id']);
        $area->setName('city');
        $deliveredInformation->setCity($area);
        $area = new \Area\Model\Area();
        $area->setId($relationships['areas'][2]['id']);
        $area->setName('district');
        $deliveredInformation->setDistrict($area);
        $deliveredInformation->setConsigneePhone($data['attributes']['consigneePhone']);
        $deliveredInformation->setConsigneePostalCode($data['attributes']['consigneePostalCode']);

        $resource = new Resource($deliveredInformation, new \Web\View\DeliveredInformationSerializer);
        $resource->with(['areas']);
        $document = new Document($resource);
        $document->addLink('self', 'http://api.51chengxinyou.com/deliveredInformations');
        $this->render($document);
        return true;
    }

    /**
     * 对应路由 /productTypes/{id:\d+}
     * DELETE方法传参
     * 根据店铺分类id,删除店铺分类
     * 1. 删除店铺分类
     *
     * 示例: /productTypes/1 删除店铺分类
     *
     * @return jsonApi
     */
    public function delete($id)
    {
        //204?
        $document = new Document();
        $document->setMeta(['key' => 'value']);
        $document->setJsonapi('v1.0');
        $this->render($document);
        return true;
    }
}
