<template>
    <Collapse v-model="value">
        <Panel name="1">
            問題：無尾熊的尾巴有什麼作用？
            <template #content
                >無尾熊其實是有尾巴的，但是短小而笨拙，像一個「私家座墊」，讓牠們能長時間舒適地坐在樹上睡覺。</template
            >
        </Panel>
        <Panel name="2">
            問題：無尾熊的主食為？
            <template #content
                >無尾熊非常挑食，在六百多種尤加利樹中，只喜歡其中的幾十種。成熟的無尾熊喜歡待在高大的尤加利樹上，每天需攝食超過900公克的尤加利樹葉。由於葉中含豐富的水分，無尾熊日常所需的水分幾乎都從採食尤加利樹葉與嫩芽中獲得，很少飲水。尤加利樹葉中也具有大量的纖維，所以通常需要三天左右的時間才能將其消化完全。除了上述的兩種成分外，尤加利樹葉的營養成分其實是很低的，只有在嫩葉的基部具有較高含量的糖分，這大概也就是無尾熊特別喜愛攝食嫩葉的原因。</template
            >
        </Panel>
        <Panel name="3">
            問題：無尾熊一天能睡多久？
            <template #content
                >無尾熊每天花在睡眠及休息的時間約18～20小時，約佔80%的時間。</template
            >
        </Panel>
        <Panel name="4">
            問題：英文名「koala」來自於澳洲原始住民，意思是什麼？
            <template #content
                >Gula 無尾熊
                是澳洲原住民語中「不喝水」的意思，無尾熊從樹葉中補充到足夠水分，幾乎不需要喝水，但是牠們有需要時也會到河邊喝水。</template
            >
        </Panel>
        <Panel name="5">
            問題：無尾熊是熊科動物嗎？
            <template #content
                >雖然名為無尾「熊」，但不是熊科動物，而是袋類動物。雌性無尾熊與袋鼠一樣腹部有育兒袋，不過袋口是向下的。</template
            >
        </Panel>
    </Collapse>
</template>

<script>
export default {};
</script>

<style lang="scss"></style>
